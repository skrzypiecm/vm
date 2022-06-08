<?php

namespace VendingMachine\Action;

use VendingMachine\Response\ResponseInterface;
use VendingMachine\VendingMachineInterface;

class Action implements ActionInterface
{
    public function __construct( private string $actionName ){}

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function handle(VendingMachineInterface $vendingMachine): ResponseInterface
    {
        // TODO: Implement handle() method.
    }
}