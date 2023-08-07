<?php

use PHPUnit\Framework\TestCase;
use App\Models\Collection;


class CollectionTest extends TestCase
{
    protected $collection;

    public function setUp() : void{
        $this->collection = new Collection([]);
    }

    public function testEmptyCollectionReturnsNoitems(){

        $this->assertEmpty($this->collection->get());
    }

    /** @test **/
    public function count_is_correct_for_items_passed_in(){
       
        $arrayOfItems = ['one', 'two', 'three'];
        $this->collection = new Collection($arrayOfItems);

        $this->assertEquals(3, $this->collection->count());

    } 

} 


