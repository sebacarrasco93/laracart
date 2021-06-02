<?php

namespace SebaCarrasco93\LaraCart;

class LaraCart
{
    public $items = [];
    public $count = 0;
    public $total = 0;

    public function __construct()
    {
        $this->readFromSession();
    }

    public function readFromSession()
    {
        if (isset(session('laracart')['items'])) {
            $this->items = session('laracart')['items'];
            $this->count = session('laracart')['count'];
            $this->total = session('laracart')['total'];
        }
    }

    public function storeSession()
    {
        session(['laracart' => collect($this)->toArray()]);
    }

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

    public function flush()
    {
        $this->items = [];
        $this->count = 0;
        $this->total = 0;
        
        session(['laracart' => null]);
    }
}
