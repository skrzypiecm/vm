<?php

namespace VendingMachine\Item;

class ItemCode implements ItemCodeInterface
{
    /**
     * @param string $code
     */
    public function __construct( private string $code ) {}

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->code;
    }
}