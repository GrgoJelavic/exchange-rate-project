<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');
require_once('./system/util/HistoryHandler.class.php');
/**
 * DailyHistoryPage displays exchange rate history on selected day by certain date
 * 
 * @method code implements page logic
 */
class DailyHistoryPage extends AbstractPage
{
    /**
     * Displays daily rates on certain date 
     * 
     * Displays from database table ExchangeRates, if it's not stored then gets data from API openexchangerates.org
     */
    public function code()
    {
        HistoryHandler::getDailyRates($_GET["date"]);
    }
}
