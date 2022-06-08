<?php

namespace Tests\Unit\Input;

use VendingMachine\Exception\InvalidInputException;

class InputHandlerTest extends \PHPUnit\Framework\TestCase
{
    public function testShouldDetectWhatUserWroteAndThrowExceptionWhenUserWroteUndeclaredCommand()
    {
        // Except
        $this->expectException(InvalidInputException::class);
        $this->expectExceptionMessage('This command was not found');

        //Given
        $inputHandler = new InputHandler();

        //When
    
        //Then
            
     }
}