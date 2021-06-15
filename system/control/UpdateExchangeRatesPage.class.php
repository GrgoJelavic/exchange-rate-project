<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('AbstractPage.class.php');
require_once('./system/util/ExchangeRatesHandler.class.php');

/**
 * UpdateExchangeRatesPage updates exchange rates in the database on daily basis
 */
class UpdateExchangeRatesPage extends AbstractPage
{
    /**
     * UpdateExchangeRatesPage logic
     */
    public function code()
    {

        ExchangeRatesHandler::updateLatestRates();
    }
}
