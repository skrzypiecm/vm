<?php

namespace VendingMachine\Action;

use VendingMachine\Response\ResponseInterface;
use VendingMachine\VendingMachineInterface;

interface ActionInterface
{
    public function getName(): string;
    public function handle(VendingMachineInterface $vendingMachine): ResponseInterface;
}
