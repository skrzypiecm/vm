<?php

namespace VendingMachine\Input;

use VendingMachine\Action\InputActions;
use VendingMachine\Exception\InvalidInputException;
use VendingMachine\VendingMachineInterface;

class InputHandler extends InputActions implements InputHandlerInterface
{
    const COMMAND_NOT_FOUND = 'This command was not found';

    public function __construct( private string $userInput)
    {
        $addMoneyKeys = array_keys(self::ACTION_ADD_MONEY);

        if( $this->checkGetInputPattern($this->userInput) || in_array( $this->userInput, $addMoneyKeys )  || $this->userInput == self::ACTION_RETURN_MONEY )
            return;
        else
            throw new InvalidInputException(self::COMMAND_NOT_FOUND );
    }

    public function getInput() : InputInterface
    {
        return new Input( $this->userInput);
    }
}