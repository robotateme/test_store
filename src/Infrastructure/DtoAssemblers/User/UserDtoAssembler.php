<?php

namespace Source\Infrastructure\Assemblers\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Source\Domain\Dto\User\Output\UserDto;
use Source\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;

class UserDtoAssembler extends BaseDtoAssembler
{


    /**
     * @param  array  $data
     * @return UserDto
     */
    public static function fromArray(array $data): UserDto
    {
        return new UserDto(
            $data['id'] ?? null,
            $data['name'] ?? null,
            $data['email'] ?? null,
            $data['email_verified_at'] ?? null,
            $data['password'] ?? null,
            $data['created_at'] ?? null,
            $data['updated_at'] ?? null,
            $data['remember_token'] ?? null,
        );
    }

    /**
     * @param  Model|User  $model
     * @return UserDto
     */
    public static function fromModel(Model|User $model): UserDto
    {
        return new UserDto(
            $model->id,
            $model->name,
            $model->email,
            $model->email_verified_at,
            $model->password,
            $model->created_at,
            $model->updated_at,
            $model->remember_token
        );
    }
}