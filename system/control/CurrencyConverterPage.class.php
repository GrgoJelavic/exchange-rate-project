<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');
require_once('./system/util/CurrencyConverterHandler.class.php');

/**
 * Currency converter page converts currencies (base USD)
 *
 * @method code implements page logic
 */
class CurrencyConverterPage extends AbstractPage
{
    /**
     *  Converts latest exchange rates stored in the database table ExchangeRates
     */
    public function code()
    {
        CurrencyConverterHandler::convertCurrency($_GET["from"], $_GET["to"], $_GET["amount"]);
    }
}
