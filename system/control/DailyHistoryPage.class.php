<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/util/HistoryHandler.class.php');
/**
 * DailyHistoryPage displays exchange rate history on selected day by certain date
 * 
 * @method code implements page logic
 */
class DailyHistoryPage extends AbstractPage
{
    /**
     * Displays daily rates on certain date
     */
    public function code()
    {
        HistoryHandler::getDailyRates($_GET["date"]);
    }
}
