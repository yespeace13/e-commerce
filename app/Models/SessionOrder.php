<?php

namespace App\Models;

class SessionOrder
{
    private array $items = array();

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(Product $product, int $quantity): void
    {
        $isExist = false;
        foreach ($this->items as $item) {
            if ($item->getProduct()->id == $product->id) {
                $item->setQuantity($item->getQuantity() + $quantity);
                $isExist = true;
            }
        }
        if (!$isExist) {
            $this->items[] = new SessionOrderItem($product, $quantity);
        }
    }

    public function changeQuantityItem(int $productId, int $quantity): void
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->id == $productId) {
                $item->setQuantity($quantity);
            }
        }
    }

    public function removeItem(int $productId): void
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->id == $productId) {
                unset($this->items[array_search($item, $this->items)]);
            }
        }
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPriceAtPurchase();
        }
        return $total;
    }

}
