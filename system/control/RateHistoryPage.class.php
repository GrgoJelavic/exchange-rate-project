<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('AbstractPage.class.php');
require_once('./system/util/HistoryHandler.class.php');

/**
 * RateHistoryPage displays rate history by certain date and rates history by period
 */
class RateHistoryPage extends AbstractPage
{
    /**
     * RatesHistoryPage displays the rate by the certain date and rates by certain period
     */
    public function code()
    {

        HistoryHandler::getCurrencyRateByDate($_GET["date"], $_GET["code"]);
    }
}
