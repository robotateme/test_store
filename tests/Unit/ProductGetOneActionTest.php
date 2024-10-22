<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Contracts\Container\BindingResolutionException;
use JetBrains\PhpStorm\NoReturn;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use Source\Domain\Actions\Product\ProductGetOneAction;
use Source\Infrastructure\Assemblers\Product\ProductDtoAssembler;
use Source\Infrastructure\Repositories\Product\Contracts\ProductsRepositoryInterface;
use Tests\TestCase;

class ProductGetOneActionTest extends TestCase
{
    /**
     * @param $product1
     * @param $product2
     * @return void
     * @throws BindingResolutionException
     */
    #[NoReturn] #[DataProvider('dummyProducts')]
    public function testGetOne($product1, $product2): void
    {
        $repository = Mockery::mock(ProductsRepositoryInterface::class,
            function (MockInterface $mock) use ($product1, $product2) {
                $mock->shouldReceive('getOne')
                    ->with(1)
                    ->andReturn($product1)
                    ->once();
                $mock->shouldReceive('getOne')
                    ->with(2)
                    ->andReturn($product2)
                    ->once();
            });

        $this->app->instance(ProductsRepositoryInterface::class, $repository);
        $action = $this->app->make(ProductGetOneAction::class);
        $result = $action->handle(1);
        $this->assertEquals($product1->toArray(), $result->toArray());
        $result2 = $action->handle(2);
        $this->assertEquals($product2->toArray(), $result2->toArray());
    }

    /**
     * @return array[]
     */
    public static function dummyProducts(): array
    {
        return [
            [
                ProductDtoAssembler::fromModel(Product::factory()->make(['id' => 1])),
                ProductDtoAssembler::fromModel(Product::factory()->make(['id' => 2])),
            ]
        ];
    }
}