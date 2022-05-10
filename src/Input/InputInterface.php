<?php

namespace VendingMachine\Input;

use VendingMachine\Action\ActionInterface;
use VendingMachine\Money\MoneyCollectionInterface;

interface InputInterface
{
	public function getAction(): ActionInterface;
	public function getMoneyCollection(): MoneyCollectionInterface;
}
