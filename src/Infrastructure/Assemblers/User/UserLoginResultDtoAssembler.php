<?php

namespace Source\Infrastructure\Assemblers\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\Contracts\DtoInterface;
use Source\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;

class UserLoginResultDtoAssembler extends BaseDtoAssembler
{

    /**
     * @param  array  $data
     * @return DtoInterface
     */
    public static function fromArray(array $data): DtoInterface
    {
        throw new RuntimeException("Method is unimplemented");
    }

    /**
     * @param  Model|User  $model
     * @return BaseDto
     */
    public static function fromModel(Model|User $model): DtoInterface
    {
        throw new RuntimeException("Method is unimplemented");
    }
}