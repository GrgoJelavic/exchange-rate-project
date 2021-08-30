<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/util/HistoryHandler.class.php');

/**
 * PeriodHistoryPage displays selected currency rate history by certain period
 * 
 * @method code implements page logic
 */
class PeriodHistoryPage extends AbstractPage
{
    /**
      PeriodHistoryPage displays selected currency history rates by certain period
     */
    public function code()
    {
        (isset($_GET['fromDate']) && isset($_GET["toDate"]) && isset($_GET["code"]))
            ? HistoryHandler::getRateByPeriod($_GET["fromDate"], $_GET["toDate"], $_GET["code"])
            : HistoryHandler::getRatesByPeriod($_GET["fromDate"], $_GET["toDate"]);
    }
}
