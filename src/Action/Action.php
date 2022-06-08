<?php

namespace VendingMachine\Action;

use http\Env\Response;
use VendingMachine\Response\ResponseInterface;
use VendingMachine\VendingMachineInterface;

class Action extends InputActions implements ActionInterface
{
    /**
     * @param string $actionName
     */
    public function __construct( private string $actionName ){}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->actionName;
    }

    /**
     * @param VendingMachineInterface $vendingMachine
     * @return ResponseInterface
     */
    public function handle( VendingMachineInterface $vendingMachine ) : ResponseInterface
    {
        $addMoneyKeys = array_keys(self::ACTION_ADD_MONEY);
        if( in_array($addMoneyKeys, $this->actionName) )
        {
            //$vendingMachine->insertMoney(new Money($this->actionName));

            return new Response("Money Inserted!");
        }
        elseif (preg_match(self::ACTION_GET_ITEM, $this->userInput) ? true : false)
        {
            return new Response("Here you are");
        }
        elseif ($this->actionName === self::ACTION_RETURN_MONEY)
        {
            return new Response("Test return")
        }
    }


}