<?php

namespace VendingMachine\Money;

use VendingMachine\Action\InputActions;

class Money extends InputActions implements MoneyInterface
{
    /**
     * @var float
     */
    private float $value;

    /**
     * @param string $code
     */
    public function __construct(private string $code)
    {
        $this->value = self::ACTION_ADD_MONEY[strval($this->code)];
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }
}