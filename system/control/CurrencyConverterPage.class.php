<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */


error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('AbstractPage.class.php');
require_once('./system/util/CurrencyConverterHandler.class.php');


/**
 * CreateCurrencyPage creates new iso currency code (inserts selected code in the database)
 */
class CurrencyConverterPage extends AbstractPage
{

    /**
     *  logic
     */
    public function code()
    {
        CurrencyConverterHandler::convertCurrency($_GET["from"], $_GET["to"], $_GET["amount"]);
    }
}
