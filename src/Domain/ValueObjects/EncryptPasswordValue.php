<?php

namespace Src\Domain\ValueObjects;

use Src\Core\Utils\PasswordUtils;
use Src\Domain\Contracts\ValueObjectInterface;

readonly class EncryptPasswordValue implements ValueObjectInterface
{
    private string $value;
    public function __construct(private string $password)
    {
        $this->value = PasswordUtils::hashPasswordSha256($this->password);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}