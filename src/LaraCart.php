<?php

namespace SebaCarrasco93\LaraCart;

class LaraCart
{
    public $items;

    public function add(array $item)
    {
        $this->items[] = $item;
    }
}
