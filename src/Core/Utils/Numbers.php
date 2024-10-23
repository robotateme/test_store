<?php

namespace Source\Core\Utils;

use InvalidArgumentException;

class Numbers
{
    public static function numberToString(float $number, ?int $precision = null): string
    {
        if ($precision === null) {
            $precision = (int) ini_get('precision');
        }

        if (!preg_match(
            '/^(-?)(\d)\.(\d+)e([+-]\d+)$/',
            sprintf('%.' . ($precision - 1) . 'e', (float) $number),
            $match
        )) {
            throw new InvalidArgumentException(
                sprintf('Unable to convert "%s" into a string representation.', $number)
            );
        }

        $digits = rtrim($match[2] . $match[3], '0');
        $shift = (int) $match[4] + 1;

        return $match[1] . rtrim(
                (substr(str_pad($digits, $shift, '0'), 0, max(0, $shift)) ?: '0')
                . '.' . str_repeat('0', max(0, -$shift))
                . substr($digits, max(0, $shift)),
                '.'
            );
    }
}