<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

// error_reporting(E_ALL);
// ini_set('display_errors', 'on');

require_once('./system/util/ExchangeRatesHandler.class.php');

/**
 * ApstractPage is base class for all pages
 */
class AbstractPage
{
    public function __construct()
    {
        $obj = $this->code();
        ExchangeRatesHandler::updateLatestRates();
    }

    /**
     * Page logic
     */
    public function code()
    {
    }
}
