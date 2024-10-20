<?php

namespace Source\Infrastructure\Assemblers\Product;

use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Domain\Dto\Product\Response\ProductDto;
use Source\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;

class ProductDtoAssembler extends BaseDtoAssembler
{
    /**
     * @param  Product  $model
     * @return BaseDto
     */
    public static function fromModel(Model $model): BaseDto
    {
        return new ProductDto(
            $model->getId(),
            $model->getTitle(),
            $model->getPrice(),
            $model->getCreatedAt());
    }

    /**
     * @param  array  $data
     * @return DtoInterface
     * @throws AssemblerException
     */
    public static function fromArray(array $data): BaseDto
    {
        try {
            return new ProductDto(
                $data['id'] ?? null,
                $data['title'] ?? null,
                $data['price'] ?? null,
                    $data['created_at'] ?? null);
        } catch (Exception $exception) {
            throw new AssemblerException($exception->getMessage());
        }
    }
}