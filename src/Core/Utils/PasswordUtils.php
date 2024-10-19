<?php

namespace Src\Core\Utils;

class PasswordUtils
{
    public static function hashPasswordSha256(string $password): string
    {
        $secret = (getenv('APP_SECRET')) ?: 'secret';;
        return hash_hmac('sha256', $password, $secret);
    }
}