<?php

namespace Source\Infrastructure\Repositories\Basket;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Builder;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;
use Source\Domain\Dto\Basket\Response\BasketPositionDto;
use Source\Domain\Dto\Basket\Response\BasketPositionsDto;
use Source\Domain\Dto\Contracts\BaseDtoCollection;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Infrastructure\Assemblers\Basket\BasketPositionDtoAssembler;
use Source\Infrastructure\Assemblers\Basket\BasketPositionsDtoAssembler;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Source\Infrastructure\Repositories\Basket\Contracts\BasketsRepositoryInterface;
use Source\Infrastructure\Repositories\Contracts\BaseDbRepository;

class BasketsDbRepository extends BaseDbRepository implements BasketsRepositoryInterface
{
    /**
     * @param  BasketAddProductDto  $addProductDto
     * @return BasketPositionDto
     */
    public function create(BasketAddProductDto $addProductDto): DtoInterface
    {
        /** @var Product $model */
        $model = $this->getBuilder()
            ->create($addProductDto->toArray());
        return BasketPositionDtoAssembler::fromModel($model);
    }

    /**
     * @throws AssemblerException
     */
    public function getPositions(int $productId, string $sessionId, int $userId = null): BaseDtoCollection
    {
        $positions = $this->query(where: function (Builder $builder) use ($productId, $userId, $sessionId) {
            $builder->where('product_id', $productId);
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
}