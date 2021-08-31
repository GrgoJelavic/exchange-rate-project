<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');
require_once('./system/util/CurrencyAdminHandler.class.php');

/**
 * DeleteCurrencyPage deletes iso currency code (deletes selected code in the database CurrencyAdmin)
 * 
 * @method code implements page logic
 */
class DeleteCurrencyPage extends AbstractPage
{
    /**
     * Deletes currency if it exists in the database
     */
    public function code()
    {
        if (isset($_GET['code'])) {

            $code = strtoupper($_GET['code']);

            (!CurrencyAdminHandler::checkCurrencyInDb($code))
                ? CurrencyAdminHandler::deleteCurrency($code)
                : print($code . ' was not in the database so can not be deleted!');
        }
    }
}
