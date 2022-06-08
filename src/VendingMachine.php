<?php

namespace VendingMachine;

use VendingMachine\Item\ItemCodeInterface;
use VendingMachine\Item\ItemInterface;
use VendingMachine\Money\MoneyCollectionInterface;
use VendingMachine\Money\MoneyInterface;

class VendingMachine implements VendingMachineInterface
{

    public function addItem(ItemInterface $item): void
    {
        // TODO: Implement addItem() method.
    }

    public function dropItem(ItemCodeInterface $itemCode): void
    {
        // TODO: Implement dropItem() method.
    }

    public function insertMoney(MoneyInterface $money): void
    {
        // TODO: Implement insertMoney() method.
    }

    public function getCurrentTransactionMoney(): MoneyCollectionInterface
    {
        // TODO: Implement getCurrentTransactionMoney() method.
    }

    public function getInsertedMoney(): MoneyCollectionInterface
    {
        // TODO: Implement getInsertedMoney() method.
    }
}