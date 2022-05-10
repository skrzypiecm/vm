<?php

namespace VendingMachine\Item;

interface ItemInterface
{
    public function getPrice(): float;
    public function getCount(): int;
    public function getCode(): ItemCodeInterface;
}
