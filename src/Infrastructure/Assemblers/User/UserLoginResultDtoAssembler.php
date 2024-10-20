<?php

namespace Src\Infrastructure\Assemblers\User;

use App\Dto\Contracts\BaseDto;
use App\Dto\Contracts\DtoInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;
use Src\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;

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