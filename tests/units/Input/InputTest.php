<?php

namespace units\Input;

use PHPUnit\Framework\TestCase;
use VendingMachine\Action\Action;
use VendingMachine\Input\Input;

class InputTest extends TestCase
{
    public function testShouldCheckTheReturnTypeOfValueFromTheGetActionMethod()
    {
        //Given
        $command = "N";
        $expected = new Action($command);
        $inputObject = new Input($command);
        //When
        $current = $inputObject->getAction();

        //Then
        $this->assertEquals($expected, $current);
     }
}