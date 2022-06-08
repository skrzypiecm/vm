<?php

namespace VendingMachine\Input;

use VendingMachine\Exception\InvalidInputException;
use VendingMachine\VendingMachineInterface;

class InputHandler implements InputHandlerInterface
{
    public function __construct( private string $userInput ){
        if($userInput == "N" || $userInput == "D" || $userInput == "Q" || $userInput == "DOLLAR" || $userInput == "RETURN-MONEY")
            $this->getInput();
        else
            throw new InvalidInputException('This command was not found');
    }

    public function getInput(): InputInterface
    {
        return new Input($this->userInput);
    }
}