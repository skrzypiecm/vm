<?php

namespace VendingMachine\Action;

abstract class InputActions {
    protected const ACTION_ADD_MONEY = [
        "N" => 0.05,
        "D" => 0.1,
        "Q" => 0.25,
        "DOLLAR" => 1,
    ];
    protected const ACTION_GET_ITEM = "GET-";
    protected const ACTION_RETURN_MONEY = "RETURN-MONEY";

    protected function checkGetInputPattern ($command) : bool
    {
        return preg_match('/'.self::ACTION_GET_ITEM.'.*/', $command) ? true : false;
    }
}