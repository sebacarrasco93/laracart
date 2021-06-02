<?php

namespace SebaCarrasco93\LaraCart\Tests\Unit;

use SebaCarrasco93\LaraCart\Tests\TestCase;
// use SebaCarrasco93\LaraCart\Facades\LaraCart;
use SebaCarrasco93\LaraCart\LaraCart;

class LaraCartClassTest extends TestCase
{
    /** @test */
    function it_can_add_items() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        $laracart->add($this->itemTwo);
        
        $this->assertEquals($this->itemOne, $laracart->items[0]);
        $this->assertEquals($this->itemTwo, $laracart->items[1]);
    }
}
