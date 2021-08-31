<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */
require_once('./system/util/AllCurrenciesHandler.class.php');
require_once('./system/util/ExchangeRatesHandler.class.php');

/**
 * ApstractPage is base class for all pages and it includes apstract method code
 * 
 * ApstractPage updates latest rates when starting an app (if same day date rates are not updated)
 * 
 * @method code is abstract method which has to be implemented in subclasses (logic for all pages)
 */
abstract class AbstractPage
{
    public function __construct()
    {
        $obj = $this->code();

        if (!AllCurenciesHandler::checkForAllCurrencies())
            AllCurenciesHandler::insertAllCurrencies();

        ExchangeRatesHandler::updateLatestRates();
    }

    /**
     * Logic has to be implemented for every page (subclass)
     */
    abstract function code();
}
