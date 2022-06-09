<?php

namespace VendingMachine\Item;

class Item implements ItemInterface
{
    /**
     * @param string $code
     * @param string $price
     * @param int $count
     */
    public function __construct( private string $code, private string $price, private int $count = 1 ) {}

    /**
     * @return float
     */
    public function getPrice() : float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getCount() : int
    {
        return $this->count;
    }

    /**
     * @return ItemCodeInterface
     */
    public function getCode() : ItemCodeInterface
    {
        return new ItemCode($this->code);
    }

    /**
     * @return void
     */
    public function decrementCount() : void
    {
        if( $this->getCount() > 0)
            $this->count -= 1;

    }

    /**
     * @return void
     */
    public function incrementCount() : void
    {
        $this->count += 1;
    }
}