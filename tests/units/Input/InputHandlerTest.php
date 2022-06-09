<?php

namespace Tests\Unit\Input;

use VendingMachine\Exception\InvalidInputException;
use VendingMachine\Input\InputHandler;
use VendingMachine\Input\Input;

class InputHandlerTest extends \PHPUnit\Framework\TestCase
{
    private array $allowCommands = [
        "GET-",
        "N",
        "D",
        "Q",
        "DOLLAR",
        "RETURN-MONEY",
    ];

    public function testShouldDetectWhatUserWroteAndThrowExceptionWhenUserWroteUndeclaredCommand()
    {
        // Except
        $this->expectException(InvalidInputException::class);
        $this->expectExceptionMessage('This command was not found');

        //Given
        $invalidUserInput = "T";

        //When
        new InputHandler($invalidUserInput);
    }

    public function testShouldReturnInputObjectWhenUserWroteCorrectCommand()
    {
        //Given
        $inputHandlers = [];
        foreach($this->allowCommands as $command)
        {
            $inputHandlers[$command] = new InputHandler($command);
        }

        //When
        foreach($inputHandlers as $command => $inputHandler)
        {
            $this->assertEquals(new Input($command), $inputHandler->getInput());
        }
    }

}