<?php

namespace SebaCarrasco93\LaraCart\Tests\Unit;

use SebaCarrasco93\LaraCart\Tests\TestCase;
// use SebaCarrasco93\LaraCart\Facades\LaraCart;
use SebaCarrasco93\LaraCart\LaraCart;

class LaraCartClassTest extends TestCase
{
    /** @test */
    function it_can_set_all_values_by_calling_init() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        
        $this->assertEquals(1, $laracart->count);
    }

    /** @test */
    function it_can_add_items() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        $laracart->add($this->itemTwo);
        
        $this->assertEquals($this->itemOne, $laracart->items[0]);
        $this->assertEquals($this->itemTwo, $laracart->items[1]);
    }
    
    /** @test */
    function it_can_add_items_and_store_to_session() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        $laracart->add($this->itemTwo);

        $this->assertEquals($this->itemOne, session('laracart')['items'][0]);
        $this->assertEquals($this->itemTwo, session('laracart')['items'][1]);

        $this->assertEquals(2, session('laracart')['count']);
        $this->assertEquals(16.4, session('laracart')['total']);
    }

    /** @test */
    function it_can_get_items() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        $laracart->add($this->itemTwo);
        
        $this->assertCount(2, $laracart->get());
    }

    /** @test */
    function it_can_get_the_count() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        $laracart->add($this->itemTwo);
        
        $this->assertEquals(2, $laracart->getCount());
    }

    /** @test */
    function it_can_get_the_total() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        $laracart->add($this->itemTwo);
        
        $this->assertEquals(16.4, $laracart->getTotal());
    }

    /** @test */
    function it_can_flush_all() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        $laracart->add($this->itemTwo);

        $laracart->se();

        $this->assertCount(0, $laracart->get());
    }

    /** @test */
    function it_can_find_an_item_by_uuid() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        $laracart->add($this->itemTwo);

        $this->assertEquals($this->itemOne, $laracart->findByUuid('111AAA'));
        $this->assertEquals($this->itemTwo, $laracart->findByUuid('222BBB'));
    }

    /** @test */
    function it_can_delete_a_item() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);
        $laracart->add($this->itemTwo);

        $laracart->delete('111AAA');
        $this->assertEquals(1, $laracart->count);

        $laracart->delete('222BBB');
        $this->assertEquals(0, $laracart->count);
    }

    /** @test */
    function it_can_update_an_item() {
        $laracart = new LaraCart();

        $laracart->add($this->itemOne);

        $newItemOne = [
            'uuid' => '111AAA',
            'name' => "Super Waffle by SoloWaffles",
            'price' => '7.1',
            'extras' => [
                'special_note' => 'Thank you'
            ],
        ];

        $laracart->update('111AAA', $newItemOne);

        $this->assertEquals(
            'Super Waffle by SoloWaffles',
            $laracart->items[0]['name']
        );
        $this->assertEquals(
            7.1,
            $laracart->items[0]['price']
        );

        $this->assertEquals(7.1, $laracart->total);
        $this->assertEquals(1, $laracart->count);

        $this->assertEquals(
            ['special_note' => 'Thank you'],
            $laracart->items[0]['extras']
        );
    }
}
