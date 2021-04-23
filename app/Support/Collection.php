<?php

namespace App\Support;

use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;

class Collection implements IteratorAggregate, JsonSerializable
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get(): array
    {
        return $this->items;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->get());
    }

    public function add(array $items): bool
    {
        $this->items = array_merge($this->items, $items);

        return true;
    }

    public function merge(Collection $collection): bool
    {
        return $this->add($collection->get());
    }

    public function toJson(): String
    {
        return json_encode($this->get());
    }

    public function jsonSerialize(): array
    {
        return $this->get();
    }
}
