<?php

namespace VendingMachine\Action;

use VendingMachine\Response\ResponseInterface;
use VendingMachine\VendingMachineInterface;

class Action implements ActionInterface
{
    /**
     * @param string $actionName
     */
    public function __construct( private string $actionName ){}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->actionName;
    }

    /**
     * @param VendingMachineInterface $vendingMachine
     * @return ResponseInterface
     */
    public function handle(VendingMachineInterface $vendingMachine): ResponseInterface
    {
        // TODO: Implement handle() method.
    }
}