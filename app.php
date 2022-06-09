<?php

    include_once __DIR__.'/vendor/autoload.php';

    use VendingMachine\Input\InputHandler;
    use VendingMachine\VendingMachine;
    use VendingMachine\Item\Item;

    $vendingMachine = new VendingMachine();

    $vendingMachine->addItem(new Item("A", 0.65));
    $vendingMachine->addItem(new Item("B", 1));
    $vendingMachine->addItem(new Item("C", 1.5));

    while(true)
    {
        $input = new InputHandler(readline("\nCommand: "));
        echo $input->getInput()->getAction()->handle($vendingMachine);
    }