<?php

namespace Tests\Unit\ActionTest;

use PHPUnit\Framework\TestCase;
use VendingMachine\Action\Action;

class ActionTest extends TestCase
{
    public function testShouldCheckValueReturnedFromGetNameMethod()
    {
        //Given
        $command = "N";
        $actionObject = new Action($command);
        $expected = $command;

        //When
        $current = $actionObject->getName();

        //Then
        $this->assertSame($expected, $current);
    }
    
    public function testShouldChecksThatTheHandleMethodRecognizesCommandsWell()
    {
        //Given
        $command = "N";
        $actionObject = new Action($command);

        //When

        //Then
            
     }
}