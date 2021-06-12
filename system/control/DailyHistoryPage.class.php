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
 * DailyHistoryPage displays rate history by certain date
 * 
 */
class DailyHistoryPage extends AbstractPage
{
    /**
      DailyHistoryPage displays daily rates on certain date
     */
    public function code()
    {
        HistoryHandler::getDailyRates($_GET["date"]);
    }
}
