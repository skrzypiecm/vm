<?php

namespace VendingMachine\Money;

class MoneyCollection implements MoneyCollectionInterface
{
    const CODE_KEY_IN_ARRAY_COLLECTION = '' . "\0" . 'VendingMachine\\Money\\Money' . "\0" . 'code';
    const VALUE_KEY_IN_ARRAY_COLLECTION = '' . "\0" . 'VendingMachine\\Money\\Money' . "\0" . 'value';

    private array $moneyCollection = [];

    /**
     * @param MoneyInterface $money
     * @return void
     */
    public function add(MoneyInterface $money): void
    {
        $this->moneyCollection[] = $money;
    }

    /**
     * @return float
     */
    public function sum(): float
    {
        return (float)array_reduce($this->moneyCollection, function ($carry, $money){
            return $carry + $money->getValue();
        });
    }

    /**
     * @param MoneyCollectionInterface $moneyCollection
     * @return void
     */
    public function merge(MoneyCollectionInterface $moneyCollection): void
    {
        $moneyArrayCollection = $moneyCollection->toArray();

        foreach ($moneyArrayCollection as $money)
        {
            $this->add( new Money($money[self::CODE_KEY_IN_ARRAY_COLLECTION]) );
        }
    }

    /**
     * @return void
     */
    public function empty(): void
    {
        $this->moneyCollection = [];
    }

    /**
     * @return array|MoneyInterface[]
     */
    public function toArray(): array
    {
        $moneyCollection = [];
        foreach($this->moneyCollection as $money)
        {
            $moneyCollection[] =  (array) $money;
        }

        return $moneyCollection;
    }

}