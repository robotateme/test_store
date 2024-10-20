<?php

namespace Source\Infrastructure\Assemblers\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Source\Domain\Dto\Contracts\BaseDto;
use Source\Domain\Dto\User\Request\UserLoginDto;
use Source\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;

class UserLoginDtoAssembler extends BaseDtoAssembler
{

    /**
     * @param  array  $data
     * @return BaseDto
     */
    public static function fromArray(array $data): BaseDto
    {
        return new UserLoginDto(
            $data['email'] ?? null,
            $data['password'] ?? null
        );
    }

    /**
     * @param  User|Model  $model
     * @return BaseDto
     */
    public static function fromModel(User|Model $model): BaseDto
    {
        return new UserLoginDto(
            $model->email,
            $model->password
        );
    }
}