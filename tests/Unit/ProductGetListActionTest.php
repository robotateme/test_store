<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\NoReturn;
use Mockery;
use PHPUnit\Framework\Attributes\DataProvider;
use Source\Domain\Actions\Product\Output\ProductGetListAction;
use Source\Domain\Dto\Pagination\Input\PaginationDto;
use Tests\TestCase;

class ProductGetListActionTest extends TestCase
{
    /**
     * A basic test example.
     * @throws BindingResolutionException
     */
    #[NoReturn] #[DataProvider('dummyProducts')] public function testGetList($paginationDto, $totalCount, $products): void
    {
        $mockBuilder = Mockery::mock(Builder::class);
        $mockBuilder->shouldReceive('when')
            ->andReturnSelf();
        $mockBuilder->shouldReceive('count')
            ->andReturn($totalCount);
        $mockBuilder->shouldReceive('get')
            ->andReturn($products);

        $mockProduct = Mockery::mock(Product::class);
        $mockProduct->shouldReceive('newModelQuery')->andReturn($mockBuilder);
        $this->app->instance(Product::class, $mockProduct);

        /** @var ProductGetListAction $action */
        $action = $this->app->make(ProductGetListAction::class);
        $action->handle($paginationDto);
        $this->assertTrue(true);
    }

    public static function dummyProducts(): array
    {
        return [
            [
                new PaginationDto(1, 10),
                100,
                Product::factory(10)->make(['id' => 1])
            ]
        ];
    }
}
