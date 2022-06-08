<?php

namespace VendingMachine\Input;

use VendingMachine\Exception\InvalidInputException;
use VendingMachine\VendingMachineInterface;

class InputHandler implements InputHandlerInterface
{
    public function __construct( private string $userInput ){
        if($this->userInput == "N" || $this->userInput == "D" || $this->userInput == "Q" || $this->userInput == "DOLLAR" || $this->userInput == "RETURN-MONEY" || preg_match('/GET-.*/', $this->userInput) ? true : false)
            $this->getInput();
        else
            throw new InvalidInputException('This command was not found');
    }

    public function getInput(): InputInterface
    {
        return new Input($this->userInput);
    }
}