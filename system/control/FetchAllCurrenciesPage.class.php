<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('AbstractPage.class.php');
require_once('./system/util/AllCurrenciesHandler.class.php');

/**
 * FetchAllCurrecniesPage fetchs all iso currency code (inserts all curencies in the DB if DB is empty)
 */
class FetchAllCurrenciesPage extends AbstractPage
{
    /**
     * FetchAllCurrenciesPage logic
     */
    public function code()
    {
        if (!AllCurenciesHandler::checkForAllCurrencies()) AllCurenciesHandler::insertAllCurrencies();
    }
}
