<?php

namespace Src\Core\Hydrator\Contracts;

interface HydratorInterface
{
    public static function hydrate(string|object $class, array $data);
}