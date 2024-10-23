<?php

namespace Source\Infrastructure\Assemblers\Basket;

use App\Models\Basket;
use Illuminate\Database\Eloquent\Model;
use Source\Domain\Dto\Basket\Output\BasketPositionDto;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Domain\ValueObjects\BasketPositionSubtotalValue;
use Source\Domain\ValueObjects\DatetimeValue;
use Source\Domain\ValueObjects\Exception\ValueException;
use Source\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Source\Infrastructure\Assemblers\Product\ProductDtoAssembler;

class BasketPositionDtoAssembler extends BaseDtoAssembler
{

    /**
     * @param  array  $data
     * @return DtoInterface
     * @throws AssemblerException
     */
    public static function fromArray(array $data): DtoInterface
    {
        $product = $data['product'] ?? null;
        try {
            return new BasketPositionDto(
                $data['id'] ?? null,
                $data['user_id'] ?? null,
                $data['session_id'] ?? null,
                $data['product_id'] ?? null,
                $data['quantity'] ?? null,
                (new BasketPositionSubtotalValue($product['price'] ?? null, $data['quantity']))->getValue() ?? null,
                (new DatetimeValue($data['created_at']))->getValue(),
                ProductDtoAssembler::fromArray($product)
            );
        } catch (ValueException $e) {
            throw new AssemblerException($e->getMessage());
        }
    }

    /**
     * @param  Model|Basket  $model
     * @return DtoInterface
     * @throws AssemblerException
     */
    public static function fromModel(Model|Basket $model): DtoInterface
    {
        /** @var Basket $model */
        $product = $model->product;
        try {
            return new BasketPositionDto(
                $model->id,
                $model->user_id,
                $model->session_id,
                $model->product_id,
                $model->quantity,
                (new BasketPositionSubtotalValue($product->price, $model->quantity))->getValue(),
                (new DatetimeValue($model->created_at))->getValue(),
                ProductDtoAssembler::fromModel($product)
            );
        } catch (ValueException $e) {
            throw new AssemblerException($e->getMessage());
        }
    }
}