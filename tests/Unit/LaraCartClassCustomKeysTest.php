<?php

namespace SebaCarrasco93\LaraCart\Tests\Unit;

use SebaCarrasco93\LaraCart\Tests\TestCase;
// use SebaCarrasco93\LaraCart\Facades\LaraCart;
use SebaCarrasco93\LaraCart\LaraCart;

class LaraCartClassCustomKeysTest extends TestCase
{
    /** @test */
    function it_can_set_a_custom_price_key() {
        $laracart = new LaraCart();
        $laracart->setPriceKey('precio');

        $itemOne = [
            'uuid' => '111AAA',
            'name' => "Lemon Waffle by SoloWaffles",
            'precio' => '3990',
        ];

        $laracart->add($itemOne);

        $this->assertEquals(3990, session('laracart')['total']);
    }
}
