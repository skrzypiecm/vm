<?php

namespace VendingMachine\Item;

use VendingMachine\Exception\ItemNotFoundException;

class ItemCollection implements ItemCollectionInterface
{
    public function add(ItemInterface $item): void
    {
        // TODO: Implement add() method.
    }

    public function get(ItemCodeInterface $itemCode): ItemInterface
    {
        // TODO: Implement get() method.
    }

    public function count(ItemCodeInterface $itemCode): int
    {
        // TODO: Implement count() method.
    }

    public function empty(): void
    {
        // TODO: Implement empty() method.
    }
}