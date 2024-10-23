<?php

namespace Source\Infrastructure\Repositories\Basket;

use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Source\Domain\Dto\Basket\Input\BasketAddProductDto;
use Source\Domain\Dto\Basket\Input\BasketRemovePositionDto;
use Source\Domain\Dto\Basket\Output\BasketPositionDto;
use Source\Domain\Dto\Basket\Output\BasketPositionsDto;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Infrastructure\Assemblers\Basket\BasketPositionDtoAssembler;
use Source\Infrastructure\Assemblers\Basket\BasketPositionsDtoAssembler;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Source\Infrastructure\Repositories\Basket\Contracts\BasketsRepositoryInterface;
use Source\Infrastructure\Repositories\Contracts\BaseDbRepository;
use Source\Infrastructure\Repositories\Exceptions\RepositoryException;
use Source\Infrastructure\Repositories\Exceptions\ResourceNotFoundException;

class BasketsDbRepository extends BaseDbRepository implements BasketsRepositoryInterface
{
    /**
     * @param  BasketAddProductDto  $addProductDto
     * @return BasketPositionDto
     * @throws RepositoryException
     */
    public function create(BasketAddProductDto $addProductDto): DtoInterface
    {
        try {
            /** @var Product $model */
            $model = $this->getBuilder()
                ->create($addProductDto->toArray());
            return BasketPositionDtoAssembler::fromModel($model);
        } catch (Exception $exception) {
            report($exception->getMessage());
            throw new RepositoryException("Can't create basket position");
        }
    }

    /**
     * @throws AssemblerException
     */
    public function getPositions(string $sessionId, int $userId = null): BaseDtoCollection|BasketPositionsDto
    {
        $positions = $this->getBuilder()->where(function (Builder $builder) use ($userId, $sessionId) {
            $builder->when(!is_null($userId), function (Builder $builder) use ($userId) {
                return $builder->where('user_id', $userId);
            });
            $builder->when(is_null($userId), function (Builder $builder) use ($sessionId) {
                return $builder->where('session_id', $sessionId);
            });
            return $builder;
        })->with('product')->get();

        return BasketPositionsDtoAssembler::toCollectionOfDto($positions, BasketPositionsDto::class);
    }

    /**
     * @param  BasketAddProductDto  $addProductDto
     * @return bool
     */
    public function updatePositionIncrementQuantity(BasketAddProductDto $addProductDto): bool
    {
        $result = $this->getBuilder()->where(function (Builder $builder) use ($addProductDto) {
            $builder->where(['product_id' => $addProductDto->productId]);
            $builder->when(!is_null($addProductDto->userId),
                fn(Builder $builder) => $builder->where(['user_id' => $addProductDto->userId]));
            $builder->when(is_null($addProductDto->userId),
                fn(Builder $builder) => $builder->where(['session_id' => $addProductDto->sessionId]));
            return $builder;
        })->increment('quantity', $addProductDto->quantity);
        return $result > 0;
    }

    /**
     * @param  BasketRemovePositionDto  $removePositionDto
     * @return bool|null
     * @throws ResourceNotFoundException
     */
    public function removePosition(BasketRemovePositionDto $removePositionDto): ?bool
    {
        /** @var Product $model */
        $model = $this->getBuilder()->where(function (Builder $builder) use ($removePositionDto) {
            $builder->where(['id' => $removePositionDto->id]);
            $builder->when(!is_null($removePositionDto->userId),
                fn(Builder $builder) => $builder->where(['user_id' => $removePositionDto->userId]));
            $builder->when(is_null($removePositionDto->userId),
                fn(Builder $builder) => $builder->where(['session_id' => $removePositionDto->sessionId]));
            return $builder;
        })->first();

        if(is_null($model)) {
            throw new ResourceNotFoundException();
        }

        return $model->delete();
    }
}