<?php

namespace Tests\Unit\ActionTest;

use PHPUnit\Framework\TestCase;
use VendingMachine\Action\Action;
use VendingMachine\VendingMachine;

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
        $expectedInserMoney = 'Current balance: 0.05 (N)';
        $expectedGetItem = "B";
        //Given
        $command = 'N';
        $vendingMachine = new VendingMachine();
        $actionInsertMoneyObject = new Action( $command );

        //When
        $response = strval( $actionObject->handle($vendingMachine) );

        //Then
        $this->assertSame($expectedInserMoney, $response);
     }
}