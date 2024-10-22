<?php

namespace Source\Infrastructure\Assemblers\Basket;

use Illuminate\Database\Eloquent\Model;
use RuntimeException;
use Source\Domain\Dto\Basket\Request\BasketAddProductDto;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;

class BasketAddProductDtoAssembler extends BaseDtoAssembler
{
    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): DtoInterface
    {
        return new BasketAddProductDto(
            $data['product_id'],
            $data['quantity'],
            $data['user_id'],
            $data['session_id'],
        );
    }

    /**
     * @inheritDoc
     */
    public static function fromModel(Model $model): DtoInterface
    {
        throw new RuntimeException("Unimplemented");
    }
}