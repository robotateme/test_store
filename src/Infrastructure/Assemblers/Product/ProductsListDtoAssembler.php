<?php

namespace Src\Infrastructure\Assemblers\Product;
class ProductsListDtoAssembler extends ProductDtoAssembler
{
    public function __construct(public array $products = [])
    {
    }
}