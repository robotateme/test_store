<?php

namespace Src\Core\Utils;

class PasswordHash
{
    public static function hashPasswordBcrypt(string $password): string
    {
        $options = [
            'cost' => 12,
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public static function passwordHashVerify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}