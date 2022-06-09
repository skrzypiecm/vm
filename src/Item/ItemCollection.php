<?php

namespace VendingMachine\Item;

use VendingMachine\Exception\ItemNotFoundException;

class ItemCollection implements ItemCollectionInterface
{
    /**
     * @var array
     */
    private array $itemCollection = [];

    /**
     * @param ItemInterface $item
     * @return void
     */
    public function add( ItemInterface $item ) : void
    {
        if( isset($this->itemCollection[ strval($item->getCode()) ]) )
            $this->itemCollection[strval($item->getCode())]->incrementCount();
        else
            $this->itemCollection[strval($item->getCode())] = $item;
    }

    /**
     * @param ItemCodeInterface $itemCode
     * @throws ItemNotFoundException
     * @return ItemInterface
     */
    public function get( ItemCodeInterface $itemCode ) : ItemInterface
    {
        if( array_key_exists(strval($itemCode), $this->itemCollection) && $this->count($itemCode) > 0 )
        {
            return $this->itemCollection[strval($itemCode)];
        }
        else
            throw new ItemNotFoundException("The item you are looking for has not been found.");
    }

    /**
     * @param ItemCodeInterface $itemCode
     * @return int
     */
    public function count( ItemCodeInterface $itemCode ) : int
    {
        return $this->itemCollection[strval($itemCode)]->getCount();
    }

    /**
     * @return void
     */
    public function empty() : void
    {
        $this->itemCollection = [];
    }
}