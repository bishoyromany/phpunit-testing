<?php

use App\Support\Collection;

class CollectionTest extends PHPUnit\Framework\TestCase
{
    public function testEmptyInitialCollectionReturnNoItems()
    {
        $collection = new Collection;

        $this->assertEmpty($collection->get());
    }


    public function testCountCollection()
    {
        $collection = new Collection(['one', 'two', 'three']);

        $this->assertEquals(3, $collection->count());
    }


    public function testItemsReturnedSameAsPassed()
    {
        $collection = new Collection(['one', 'two', 'three']);

        $this->assertCount(3, $collection->get());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[1], 'two');
    }


    public function testCollectionIteratorAggregate()
    {
        $collection = new Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }


    public function testCollectionIterate()
    {
        $collection = new Collection(['one', 'two', 'three']);

        $items = [];


        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }


    public function testCollectionAdd()
    {
        $collection = new Collection([1, "two", "three"]);
        $collection->add([2]);

        $this->assertCount(4, $collection->get());
    }

    public function testCollectionMergeToOtherOne()
    {
        $collection1 = new Collection([1, "two", "three"]);
        $collection2 = new Collection(["one", 2, 3]);

        $collection1->merge($collection2);

        $this->assertCount(6, $collection1->get());
        $this->assertEquals(6, $collection1->count());
    }


    public function testReturnJSonEncodedItems()
    {
        $collection = new Collection([
            ['username' => 'Alex'],
            ['username' => 'Billy']
        ]);

        $json = json_encode($collection->get());

        $this->assertEquals($json, $collection->toJson());
    }

    public function testJsonEncodingCollectionObjectReturnsJson()
    {
        $collection = new Collection([
            ['username' => 'Alex'],
            ['username' => 'Billy']
        ]);

        $json = json_encode($collection);

        $this->assertEquals($collection->toJson(), $json);
    }
}
