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
 * PeriodHistoryPage displays selected currency rate history by certain period
 * 
 */
class PeriodHistoryPage extends AbstractPage
{
    /**
      PeriodHistoryPage displays selected currency rates by certain period
     */
    public function code()
    {
        HistoryHandler::getRatesByPeriod($_GET["fromDate"], $_GET["toDate"], $_GET["currency"]);
    }
}
