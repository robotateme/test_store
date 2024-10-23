<?php

namespace Source\Infrastructure\Assemblers\Product;

use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Product\Output\ProductDto;
use Source\Domain\ValueObjects\DatetimeValue;
use Source\Domain\ValueObjects\Exception\ValueException;
use Source\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;

class ProductDtoAssembler extends BaseDtoAssembler
{
    /**
     * @param  Product  $model
     * @return BaseDto
     * @throws AssemblerException
     */
    public static function fromModel(Model $model): BaseDto
    {
        try {
            return new ProductDto(
                $model->getId(),
                $model->getTitle(),
                $model->getPrice(),
                (new DatetimeValue($model->getCreatedAt()))->getValue());
        } catch (ValueException $e) {
            throw new AssemblerException($e->getMessage());
        }
    }

    /**
     * @param  array  $data
     * @return BaseDto
     * @throws AssemblerException
     */
    public static function fromArray(array $data): BaseDto
    {
        try {
            return new ProductDto(
                $data['id'] ?? null,
                $data['title'] ?? null,
                $data['price'] ?? null,
                    (new DatetimeValue($data['created_at']))->getValue());
        } catch (Exception $exception) {
            throw new AssemblerException($exception->getMessage());
        }
    }
}