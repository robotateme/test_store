<?php
namespace Source\Domain\Actions\Order\Input;

use Source\Domain\Actions\Exceptions\ActionException;
use Source\Domain\Actions\Order\Contracts\OrderCreateActionInterface;
use Source\Domain\Dto\Basket\Output\BasketPositionsDto;
use Source\Domain\Dto\Order\Input\OrderCreateDto;
use Source\Domain\ValueObjects\OrderNumberValue;
use Source\Domain\ValueObjects\OrderProductsStringValue;
use Source\Infrastructure\Assemblers\Exceptions\AssemblerException;
use Source\Infrastructure\Repositories\Basket\BasketsDbRepository;
use Source\Infrastructure\Repositories\Basket\Contracts\BasketsRepositoryInterface;
use Source\Infrastructure\Repositories\Order\Contracts\OrdersRepositoryInterface;
use Source\Infrastructure\Repositories\Order\OrdersDbRepository;

readonly class OrderCreateAction implements OrderCreateActionInterface
{
    /**
     * @param  OrdersRepositoryInterface|OrdersDbRepository  $orders
     * @param  BasketsRepositoryInterface|BasketsDbRepository  $baskets
     */
    public function __construct(
        private OrdersRepositoryInterface|OrdersDbRepository $orders,
        private BasketsRepositoryInterface|BasketsDbRepository $baskets,
    )
    {
    }


    public function handle(int $userId, string $sessionId = null)
    {
        try {
            /** @var BasketPositionsDto $basketPositions */
            $basketPositions = $this->baskets->getPositions($sessionId, $userId);
            $orderCreateDto = new OrderCreateDto(
                (new OrderNumberValue())->getValue(),
                (new OrderProductsStringValue($basketPositions))->getValue(),
                $basketPositions->total,
                $userId,
            );
            return $this->orders->create($orderCreateDto);
        } catch (AssemblerException $e) {
            throw new ActionException($e->getMessage());
        }

    }
}