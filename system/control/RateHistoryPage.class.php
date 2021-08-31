<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');
require_once('./system/util/HistoryHandler.class.php');

/**
 * RateHistoryPage displays rate history by certain date and rates history by period
 * 
 * @method code implements page logic
 */
class RateHistoryPage extends AbstractPage
{
    /**
     * Gets the currency rates by the certain date 
     */
    public function code()
    {
        HistoryHandler::getCurrencyRateByDate($_GET["date"], $_GET["code"]);
    }
}
