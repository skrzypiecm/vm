<?php

namespace VendingMachine\Action;

use VendingMachine\Response\ResponseInterface;
use VendingMachine\Response\Response;
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
        else if ( $this->checkGetInputPattern($this->actionName) )
        {
            return new Response("Here you are");
        }
        else if ( $this->actionName === self::ACTION_RETURN_MONEY )
        {
            return new Response("Test return");
        }
        else {
            return new Response("");
        }
    }


}