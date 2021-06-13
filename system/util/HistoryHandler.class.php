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

            $sql = "SELECT code AS currency, rate FROM ExchangeRates WHERE onDate =  '" . $date . "' ";
            $result = AppCore::getDB()->sendQuery($sql);

            //Get Daily Rates from API
            $numrow = mysqli_num_rows($result);
            if ($numrow === 0) self::getDailyRatesAPI($date);
            else {
                $data = [];
                while ($row = $result->fetch_assoc()) $data[] = $row;

                echo (json_encode($data));

                return true;
            }
        } else echo 'The incorrect route!';
    }

    public static function getCurrencyRateByDate($date, $code)
    {
        if (isset($date) && isset($code)) {

            $sql = "SELECT code AS currency, rate FROM ExchangeRates WHERE onDate =  '" . $date . "' AND code = '" . $code . "'";
            $result = AppCore::getDB()->sendQuery($sql);

            $data = array();

            while ($row = $result->fetch_assoc()) $data[] = $row;

            echo (json_encode($data));
        } else echo 'The incorrect route!';
    }

    public static function getRatesByPeriod($fromDate, $toDate, $code)
    {
        if (isset($fromDate) && isset($toDate) && isset($code)) {

            $fromDate = $_GET["fromDate"];
            $toDate = $_GET["toDate"];
            $code = $_GET["code"];

            $sql = "SELECT code AS currency, rate, onDate AS date FROM ExchangeRates WHERE onDate >= '" . $fromDate . "' AND onDate <= '" . $toDate . "' AND code = '" . $code . "'";

            $result = AppCore::getDB()->sendQuery($sql);

            $data = array();

            while ($row = $result->fetch_assoc()) $data[] = $row;

            echo (json_encode($data));

            return true;
        } else echo 'The incorrect route!';
    }

    public static function getDailyRatesAPI($date)
    {
        if (self::validateDate($date)) {

            $latestRates = json_decode(file_get_contents("https://openexchangerates.org/api/historical/$date.json?app_id='" . APP_ID . "'"), true);

            print 'Date: ' . $date . '<br>';

            foreach ($latestRates['rates'] as $key => $value)
                print($key . ' ' . $value . '<br>');

            return true;
        } else echo 'The invalid route, selected date format is incorrect!';
    }

    public static function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) == $date;
    }
}
