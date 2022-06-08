<?php

namespace VendingMachine\Input;

use VendingMachine\Action\ActionInterface;
use VendingMachine\Money\MoneyCollectionInterface;

class Input implements InputInterface
{

    public function getAction(): ActionInterface
    {
        // TODO: Implement getAction() method.
    }

    public function getMoneyCollection(): MoneyCollectionInterface
    {
        // TODO: Implement getMoneyCollection() method.
    }
}