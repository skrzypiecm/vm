<?php

namespace VendingMachine\Input;

use VendingMachine\Action\ActionInterface;
use VendingMachine\Money\MoneyCollectionInterface;

class Input implements InputInterface
{
    public function __construct(private string $command) {}

    public function getAction(): ActionInterface
    {

    }

    public function getMoneyCollection(): MoneyCollectionInterface
    {
        // TODO: Implement getMoneyCollection() method.
    }
}