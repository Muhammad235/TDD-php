<?php

namespace App\Models;
use IteratorAggregate;
use ArrayIterator;

class Collection implements IteratorAggregate
{
    protected $items = [];

    public function __construct (array $items = []){
        $this->items = $items;
    }

    public function get()
    {
        return $this->items;
    }

    public function count(){
        return count($this->items);
    }

    public function getIterator(){
        return new ArrayIterator($this->items);
    }

    public function merge(array $collection1, array $collection2){

        $new_array = array_merge($collection1, $collection2);
        
        return count($new_array);
    }


}