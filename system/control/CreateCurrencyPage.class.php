<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');
require_once('./system/util/AllCurrenciesHandler.class.php');
require_once('./system/util/CurrencyAdminHandler.class.php');
//require_once('./system/model/CurrencyAdmin.class.php');

/**
 * CreateCurrencyPage creates new iso currency code (inserts selected code in the database)
 */
class CreateCurrencyPage extends AbstractPage
{
    /**
     * CreateCurrencyPage logic
     */
    public function code()
    {
        if (AllCurenciesHandler::validateCurrency($_GET['code'])) {

            $code = $_GET['code'];

            (CurrencyAdminHandler::checkCurrencyInDb($code))
                ? CurrencyAdminHandler::createCurrency($code)
                : 'Duplicate error - this currency was already saved!';
        } else echo 'Unauthorized currency error - currency ISO code unknown!';
    }
}
