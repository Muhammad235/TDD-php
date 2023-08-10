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

    /** @test **/
    public function items_returned_match_items_passed_in(){

        $arrayOfItems = ['one', 'two',];

        $this->collection = new Collection($arrayOfItems);

        $this->assertCount(2, $this->collection->get());

        $this->assertEquals($this->collection->get()[0], 'one');
        $this->assertEquals($this->collection->get()[1], 'two');

    }


    //check if we can iterate over an array

    /** @test **/
    public function collection_is_instance_of_iterator_aggregate(){

       $this->assertInstanceOf(IteratorAggregate::class, $this->collection);

    }


    /** @test **/
    public function collection_can_be_iterated(){

        $arrayOfItems = ['one', 'two', 'three'];

        $this->collection = new Collection($arrayOfItems);
        
        $items = [];

        foreach ($this->collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);

        $this->assertInstanceOf(ArrayIterator::class, $this->collection->getIterator());
    }
    
    /** @test **/

    public function collection_can_be_merged_with_another_collection(){

        // $this->collection = new Collection();


        $collection1 = ['one', 'two', 'three'];
        $collection2 = ['four', 'five', 'six'];

        $new_collection1 = new Collection($collection1);
        $new_collection2 = new Collection($collection2);

        $newCollection = $this->collection->merge($collection1, $collection2);
        
        $this->assertEquals(6,  $newCollection);

    }


    /** @test **/
    // public function returns_json_encoded_items(){
        
    //     $array = ([
    //         ["username" => "muhammad"],
    //         ["email" => "muhammad@him.com"]    
    //     ]);

    //     $this->assertEquals('[{"username": "muhammad"}, {"email": "muhammad@him.com"}]', $this->collection->toJson());

    // }

} 


