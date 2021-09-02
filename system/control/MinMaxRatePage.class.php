<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('AbstractPage.class.php');
require_once('./system/util/HistoryHandler.class.php');
require_once('./system/util/MinMaxRateHandler.class.php');


/**
 * 
 */
class MinMaxRatePage extends AbstractPage
{
    /*
     *
     */
    public function code()
    {
        if (isset($_GET['min'])) MinMaxRateHandler::checkMinRate($_GET["fromDate"], $_GET["toDate"], $_GET["code"]);

        if (isset($_GET['max'])) MinMaxRateHandler::checkMaxRate($_GET["fromDate"], $_GET["toDate"], $_GET["code"]);
    }
}
