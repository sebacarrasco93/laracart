<?php

namespace SebaCarrasco93\LaraCart;

class LaraCart
{
    public $items = [];
    public $count = 0;
    public $total = 0;

    public function init()
    {
        $this->setCount();
        $this->setTotal();

        $this->storeSession();
    }

    public function add(array $item)
    {
        $this->items[] = $item;
        
        $this->init();
    }

    public function get()
    {
        return $this->items;
    }

    public function storeSession()
    {
        session(['laracart' => collect($this)->toArray()]);
    }

    public function setCount()
    {
        $this->count = count($this->items);
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setTotal()
    {
        $this->total = collect($this->items)->pluck('price')->sum();
    }

    public function getTotal()
    {
        return $this->total;
    }
}
