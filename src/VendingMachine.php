<?php

namespace VendingMachine;

use VendingMachine\Action\InputActions;
use VendingMachine\Item\Item;
use VendingMachine\Item\ItemCodeInterface;
use VendingMachine\Item\ItemCollection;
use VendingMachine\Item\ItemCollectionInterface;
use VendingMachine\Item\ItemInterface;
use VendingMachine\Money\Money;
use VendingMachine\Money\MoneyCollection;
use VendingMachine\Money\MoneyCollectionInterface;
use VendingMachine\Money\MoneyInterface;

class VendingMachine extends InputActions implements VendingMachineInterface
{
    /**
     * @var MoneyCollectionInterface|MoneyCollection
     */
    public MoneyCollectionInterface $moneyCollection;

    /**
     * @var ItemCollectionInterface|ItemCollection
     */
    public ItemCollectionInterface $itemCollection;

    private float $afterTransactionBalance;
    /**
     *
     */
    public function __construct()
    {
        $this->moneyCollection = new MoneyCollection();
        $this->itemCollection  = new ItemCollection();
        $this->transactionSUM = 0;
    }

    /**
     * @param ItemInterface $item
     * @return void
     */
    public function addItem( ItemInterface $item ) : void
    {
        $this->itemCollection->add( $item );
    }

    /**
     * @param ItemCodeInterface $itemCode
     * @return void
     */
    public function dropItem( ItemCodeInterface $itemCode ) : void
    {
        $this->itemCollection->get($itemCode)->decrementCount();
    }

    /**
     * @param MoneyInterface $money
     * @return void
     */
    public function insertMoney( MoneyInterface $money ) : void
    {
        $this->moneyCollection->add( $money );
    }

    /**
     * @return MoneyCollectionInterface
     */
    public function getCurrentTransactionMoney(): MoneyCollectionInterface
    {
        $result = new MoneyCollection();
        $rest = $this->afterTransactionBalance - (int)$this->afterTransactionBalance;

        if((int)$this->afterTransactionBalance)
        {
            for($i=1; $i<=(int)$this->afterTransactionBalance; $i++)
            {
                $result->add(new Money("DOLLAR"));
            }
            if($rest) {
                foreach (array_reverse(self::ACTION_ADD_MONEY) as $code => $value)
                {
                    $nextValue = $result->sum() + $value - (int)$this->afterTransactionBalance;
                    if ($nextValue <= $rest)
                        $result->add(new Money($code));
                }
            }
        }
        elseif($this->afterTransactionBalance)
        {
            foreach(array_reverse(self::ACTION_ADD_MONEY) as $code => $value)
            {
                $nextValue = $result->sum() + $value;

                if($nextValue <= $this->afterTransactionBalance)
                    $result->add(new Money($code));
            }

        }

        return $result;
    }

    /**
     * @return MoneyCollectionInterface
     */
    public function getInsertedMoney(): MoneyCollectionInterface
    {
        return $this->moneyCollection;
    }

    /**
     * @param ItemInterface $item
     * @return void
     */
    public function makeTransation( ItemInterface $item ) : void
    {
        $currentBalance = $this->getInsertedMoney()->sum();
        $price = $item->getPrice();

        $this->dropItem($item->getCode());
        $this->afterTransactionBalance = $currentBalance - $price;

        $this->moneyCollection->empty();
        $this->moneyCollection->merge( $this->getCurrentTransactionMoney() );
    }
}