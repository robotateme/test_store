<?php

namespace Source\Infrastructure\Assemblers\Basket;

use App\Models\Basket;
use Illuminate\Database\Eloquent\Model;
use Source\Domain\Dto\Basket\Response\BasketPositionDto;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Domain\ValueObjects\BasketPositionPriceValue;
use Source\Domain\ValueObjects\DatetimeValue;
use Source\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Source\Infrastructure\Assemblers\Product\ProductDtoAssembler;

class BasketPositionDtoAssembler extends BaseDtoAssembler
{

    /**
     * @inheritDoc
     * @throws AssemblerException
     */
    public static function fromArray(array $data): DtoInterface
    {
        $product = $data['product'] ?? null;
        return new BasketPositionDto(
            $data['id'] ?? null,
            $data['product_id'] ?? null,
            $data['quantity'] ?? null,
            (new BasketPositionPriceValue($product['price'] ?? null, $data['quantity']))->getValue() ?? null,
                (new DatetimeValue($data['created_at'])) ?? null,
            ProductDtoAssembler::fromArray($product)
        );
    }

    /**
     * @inheritDoc
     */
    public static function fromModel(Model|Basket $model): DtoInterface
    {
        /** @var Basket $model */
        $product = $model->product;
        return new BasketPositionDto(
            $model->id,
            $model->product_id,
            $model->quantity,
            (new BasketPositionPriceValue($product->price, $model->quantity))->getValue(),
            (new DatetimeValue($model->created_at)) ?? null,
            ProductDtoAssembler::fromModel($product)
        );
    }
}