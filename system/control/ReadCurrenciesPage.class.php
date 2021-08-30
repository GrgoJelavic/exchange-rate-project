<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/util/CurrencyAdminHandler.class.php');

/**
 * ReadCurrenciesPage displays all currencies stored in the database
 */
class ReadCurrenciesPage extends AbstractPage
{
    /**
     *  Reads all currencies stored in the database
     */
    public function code()
    {
        CurrencyAdminHandler::readCurrencies();
    }
}
