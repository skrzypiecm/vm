<?php

namespace VendingMachine\Action;

use VendingMachine\Item\ItemCode;
use VendingMachine\Money\Money;
use VendingMachine\Money\MoneyCollection;
use VendingMachine\Response\ResponseInterface;
use VendingMachine\Response\Response;
use VendingMachine\VendingMachineInterface;


class Action extends InputActions implements ActionInterface
{
    private const ADD_MONEY_RESPONSE = 'Current balance: ';
    private const TOO_LITLE_MONEY_RESPONSE = 'You don\'t have enough money';
    private const GET_ITEM_SEPARATOR = '-';

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
        $addMoneyKeys = array_keys( self::ACTION_ADD_MONEY );
        if( in_array( $this->actionName, $addMoneyKeys ) )
        {
            return new Response( $this->insertMoneyAction($vendingMachine) );
        }
        else if ( $this->checkGetInputPattern($this->actionName) )
        {
            return new Response( $this->getItemAction($vendingMachine) );
        }
        else if ( $this->actionName === self::ACTION_RETURN_MONEY )
        {
            return new Response( $this->returnMoneyAction( $vendingMachine ) );
        }
        else
            return new Response( "Bye!" );
    }

    /**
     * @param VendingMachineInterface $vendingMachine
     * @return string
     */
    private function insertMoneyAction( VendingMachineInterface $vendingMachine ) : string
    {
        $vendingMachine->insertMoney( new Money($this->actionName) );
        $currentBalance = $vendingMachine->getInsertedMoney()->sum();
        $moneyCodesInCollection = $this->getMoneyCodesInCollection( $vendingMachine );

        return self::ADD_MONEY_RESPONSE.$currentBalance.' ('.$moneyCodesInCollection.')';
    }

    /**
     * @param VendingMachineInterface $vendingMachine
     * @return string
     */
    private function getItemAction( VendingMachineInterface $vendingMachine ) : string
    {
        $itemCode =  new ItemCode( explode(self::GET_ITEM_SEPARATOR, $this->actionName)[1] );
        $item = $vendingMachine->itemCollection->get( $itemCode );
        $currentBalance = $vendingMachine->getInsertedMoney()->sum();

        if($currentBalance >= $item->getPrice())
        {
            $vendingMachine->makeTransation( $item );
            return $itemCode;
        }
        else
            return self::TOO_LITLE_MONEY_RESPONSE;

    }

    /**
     * @param VendingMachineInterface $vendingMachine
     * @return string
     */
    private function returnMoneyAction( VendingMachineInterface $vendingMachine ) : string
    {
        $moneyCodesInColection = $this->getMoneyCodesInCollection( $vendingMachine );
        $vendingMachine->moneyCollection->empty();

        return $moneyCodesInColection;
    }

    /**
     * @param VendingMachineInterface $vendingMachine
     * @return string
     */
    public function getMoneyCodesInCollection( VendingMachineInterface $vendingMachine ) : string
    {
        $moneyCollection= $vendingMachine->getInsertedMoney()->toArray();

        $moneyCodesInCollection = '';

        for( $i = 0; $i <= count($moneyCollection) - 1; $i++ )
        {
            if($i == 0 && count($moneyCollection) == 1)
                $moneyCodesInCollection = $moneyCodesInCollection.$moneyCollection[$i][MoneyCollection::CODE_KEY_IN_ARRAY_COLLECTION];

            elseif ($i == 0 && count($moneyCollection) > 1)
                $moneyCodesInCollection = $moneyCodesInCollection.' '.$moneyCollection[$i][MoneyCollection::CODE_KEY_IN_ARRAY_COLLECTION];

            else
                $moneyCodesInCollection = $moneyCodesInCollection.', '.$moneyCollection[$i][MoneyCollection::CODE_KEY_IN_ARRAY_COLLECTION];
        }

        return $moneyCodesInCollection;
    }

}