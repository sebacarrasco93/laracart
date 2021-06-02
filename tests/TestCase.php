<?php

namespace SebaCarrasco93\LaraCart\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
// use SebaCarrasco93\LaraCart\Facades\LaraCart;
// use SebaCarrasco93\LaraCart\LaraCart as LaraCartClass;
use SebaCarrasco93\LaraCart\LaraCartServiceProvider;

class TestCase extends BaseTestCase
{
    protected function setUp() : void
    {
        parent::setUp();
        
        $this->itemOne = [
            'uuid' => '111AAA',
            'name' => "Lemon Waffle by SoloWaffles",
            'price' => '8.5',
        ];

        $this->itemTwo = [
            'uuid' => '222BBB',
            'name' => "Mixed Waffle by SoloWaffles",
            'price' => '7.9',
        ];

    }

    // protected function getPackageProviders($app)
    // {
    //     return [
    //         LaraCartServiceProvider::class
    //     ];
    // }

    // protected function getPackageAliases($app)
    // {
    //     return [
    //         'LaraCart' => '\SebaCarrasco93\LaraCart\Facades\LaraCart::class'
    //     ];
    // }
}
