<?php

namespace Tests\Helpers;

class DummyClassWithStatic
{
    /**
     * @param  int  $num
     * @return float|int
     */
    public static function staticMethod(int $num): float|int
    {
        return $num * 4;
    }
}