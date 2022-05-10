<?php

namespace VendingMachine\Item;

use VendingMachine\Exception\ItemNotFoundException;

interface ItemCollectionInterface
{
    public function add(ItemInterface $item): void;

    /**
     * @throws ItemNotFoundException
     */
    public function get(ItemCodeInterface $itemCode): ItemInterface;

    public function count(ItemCodeInterface $itemCode): int;

    public function empty(): void;
}
