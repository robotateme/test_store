<?php

namespace Src\Core\Hydrator;

use ReflectionClass;
use ReflectionException;
use Src\Core\Hydrator\Contracts\HydratorInterface;
use Src\Core\Hydrator\Exceptions\HydratorException;

class Hydrator implements HydratorInterface
{
    /**
     * @throws HydratorException
     */
    public static function hydrate(object|string $class, array $data): object
    {
        try {
            if (is_string($class)) {
                if (!class_exists($class)) {
                    throw new HydratorException("Given object '{$class}' must be valid class name.");
                }
                $className = $class;
            } else {
                $className = get_class($class);
            }
            $reflection = new ReflectionClass($className);
            $object = $reflection->newInstanceWithoutConstructor();

            foreach ($data as $propertyName => $propertyValue) {
                if (!$reflection->hasProperty($propertyName)) {
                    throw new HydratorException("There's no '$propertyName' property in '$className'.");
                }
                $property = $reflection->getProperty($propertyName);
                if ($property->isStatic()) {
                    continue;
                }

                $property->setValue($object, $propertyValue);
            }
            return $object;
        } catch (ReflectionException $exception) {
            throw new HydratorException($exception->getMessage());
        }
    }

    /**
     * @param  object  $object
     * @param  array  $properties
     * @return array
     * @throws HydratorException
     */
    public static function extract(object $object, array $properties = []): array
    {
        try {
            $data = [];
            $className = get_class($object);
            $reflection = new ReflectionClass($className);
            if ([] === $properties) {
                $properties = new ReflectionClass($className);
            }
            foreach ($properties as $propertyName) {
                if ($reflection->hasProperty($propertyName)) {
                    $property = $reflection->getProperty($propertyName);
                    if ($property->isStatic()) {
                        continue;
                    }
                    $data[$propertyName] = $property->getValue($object);
                }
            }
            return $data;
        } catch (ReflectionException $exception) {
            throw new HydratorException($exception->getMessage());
        }
    }
}