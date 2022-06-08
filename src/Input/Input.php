<?php

namespace VendingMachine\Input;

use VendingMachine\Action\ActionInterface;
use VendingMachine\Money\MoneyCollectionInterface;
use VendingMachine\Action\Action;

class Input implements InputInterface
{
    public function __construct(private string $command) {}

    public function getAction(): ActionInterface
    {
        return new Action($this->command);
    }

    public function getMoneyCollection(): MoneyCollectionInterface
    {
        // TODO: Implement getMoneyCollection() method.
    }
}