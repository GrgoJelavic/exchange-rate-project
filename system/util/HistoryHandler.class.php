<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');


// require_once('./system/util/HistoryHandler.class.php');

/**
 * Handles Rates History 
 * 
 * @method 
 * @method 
 */
class HistoryHandler
{
    public static function getDailyRates($date)
    {
        if (isset($date)) {

            $sql = "SELECT code, rate FROM ExchangeRates WHERE onDate =  '" . $date . "' ";

            $result = AppCore::getDB()->sendQuery($sql);

            $data = array();

            while ($row = $result->fetch_assoc()) $data[] = $row;

            echo (json_encode($data));

            return true;
        } else return false;
    }

    public static function getCurrencyRateByDate($date, $currency)
    {
        if (isset($date) && isset($currency)) {

            $sql = "SELECT code, rate FROM ExchangeRates WHERE onDate =  '" . $date . "' AND code = '" . $currency . "'";

            $result = AppCore::getDB()->sendQuery($sql);

            $data = array();

            while ($row = $result->fetch_assoc()) $data[] = $row;

            echo (json_encode($data));

            return true;
        } else return false;
    }

    public static function getRatesByPeriod($fromDate, $toDate, $currency)
    {
        if (isset($fromDate) && isset($toDate) && isset($currency)) {

            $fromDate = $_GET["fromDate"];
            $toDate = $_GET["toDate"];
            $currency = $_GET["currency"];

            $sql = "SELECT code, rate, onDate FROM ExchangeRates WHERE onDate >= '" . $fromDate . "' AND onDate <= '" . $toDate . "' AND code = '" . $currency . "'";

            $result = AppCore::getDB()->sendQuery($sql);

            $data = array();

            while ($row = $result->fetch_assoc()) $data[] = $row;

            echo (json_encode($data));

            return true;
        } else return false;
    }
}
