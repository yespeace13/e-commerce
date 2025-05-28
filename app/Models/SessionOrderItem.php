<?php

namespace App\Models;

class SessionOrderItem
{
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    private Product $product;
    private int $quantity;

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPriceAtPurchase(): float
    {
        return $this->product->price * $this->quantity;
    }
}
