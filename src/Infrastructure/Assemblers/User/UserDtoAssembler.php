<?php

namespace Src\Infrastructure\Assemblers\User;

use App\Dto\User\Response\UserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Src\Infrastructure\Assemblers\Contracts\BaseDtoAssembler;

class UserDtoAssembler extends BaseDtoAssembler
{

    /**
     * @inheritDoc
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
     * @inheritDoc
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