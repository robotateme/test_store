<?php

namespace Src\Application\Dto\Contracts;

use Src\Application\Dto\Exceptions\DtoException;

readonly class BaseDtoCollection
{
    public function __construct(public array $items = [])
    {
    }

    /**
     * @param  array  $data
     * @param  string|DtoInterface  $as
     * @return BaseDtoCollection
     * @throws DtoException
     */
    public static function collect(array $data, string|DtoInterface $as): static
    {
        if (!is_array(reset($data))) {
            throw new DtoException('Data is not an associative array');
        }

        if (is_object($as)) {
            $as = get_class($as);
        }

        $self = new static();
        foreach ($data as $item) {
            $self->items[] = $as::from($item);
        }

        return $self;
    }
}