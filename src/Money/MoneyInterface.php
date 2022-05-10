<?php

namespace VendingMachine\Money;

interface MoneyInterface
{
    public function getValue(): float;
    public function getCode(): string;
}
