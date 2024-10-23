<?php

namespace Source\Domain\ValueObjects;

use Source\Core\Utils\PasswordHash;
use Source\Domain\Contracts\ValueObjectInterface;

readonly class EncryptPasswordValue implements ValueObjectInterface
{
    private string $value;

    /**
     * @param  string  $password
     */
    public function __construct(private string $password)
    {
        $this->value = PasswordHash::hashPasswordBcrypt($this->password);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}