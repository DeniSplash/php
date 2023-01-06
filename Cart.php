<?php

require_once 'Product.php';
class Cart
{
    private array $products = [];
    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }
    public function removeProduct(Product $product): void
    {
        foreach ($this->products as $i => $value) {
            if ($value->getTitle() === $product->getTitle()) {
                unset($this->products[$i]);
            }
        }
    }
    public function getProducts(): array
    {
        return $this->products;
    }
    public function getTotalPrice(): float {
        $total = 0.0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }

        return $total;
    }

}