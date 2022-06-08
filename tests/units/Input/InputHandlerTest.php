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

    private array $inputHandlers = [];

    public function setUp(): void
    {
        foreach($this->allowCommands as $command)
        {
            $this->inputHandlers[$command] = new InputHandler($command);
        }
    }

    public function testShouldDetectWhatUserWroteAndThrowExceptionWhenUserWroteUndeclaredCommand()
    {
        // Except
        $this->expectException(InvalidInputException::class);
        $this->expectExceptionMessage('This command was not found');

        //When
        new InputHandler("T");
    }

    public function testShouldReturnInputObjectWhenUserWroteCorrectCommand()
    {
        //When
        foreach($this->inputHandlers as $command => $inputHandler)
        {
            $this->assertEquals(new Input($command), $inputHandler->getInput());
        }
     }

}