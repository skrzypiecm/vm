<?php

namespace Tests\Unit\Input;

use VendingMachine\Exception\InvalidInputException;
use VendingMachine\Input\InputHandler;

class InputHandlerTest extends \PHPUnit\Framework\TestCase
{
    public function testShouldDetectWhatUserWroteAndThrowExceptionWhenUserWroteUndeclaredCommand()
    {
        // Except
        $this->expectException(InvalidInputException::class);
        $this->expectExceptionMessage('This command was not found');

        //When
        new InputHandler("T");
    }

}