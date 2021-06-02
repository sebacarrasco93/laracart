<?php

namespace SebaCarrasco93\LaraCart\Facades;

use Illuminate\Support\Facades\Facade;

class LaraCart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laracart';
    }
}
