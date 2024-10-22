<?php

namespace Tests\Unit;

use Exception;
use JetBrains\PhpStorm\NoReturn;
use Mockery;
use Tests\Helpers\DummyClassWithStatic;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    #[NoReturn] public function testBasicTest(): void
    {
        $this->expectException(Exception::class);
        $mockStatic = Mockery::mock(DummyClassWithStatic::class);
        $mockStatic->shouldReceive('staticMethod')
            ->with(2)
            ->andReturn(8)
            ->with(3)
            ->andReturn(12)
            ->with(0)->andThrow(Exception::class, 'Test exception');

        $this->assertEquals(8, $mockStatic::staticMethod(2));
        $this->assertEquals(12, $mockStatic::staticMethod(3));
        $this->assertEquals(0, $mockStatic::staticMethod(4));
    }
}