<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

// require_once('./system/util/HistoryHandler.class.php');

/**
 * Handles Rates History using database table ExchangeRates or API openexchange.org
 * 
 * @method getDailyRates
 * @method validateDate
 * @method getCurrencyRateByDate
 * @method getRatesByPeriod
 * @method getRateByPeriod
 * @method getDailyRatesAPI
 */
class HistoryHandler
{
    /**
     * Gets selected daily rates from ExchangeRates database table
     * 
     * @param $date
     * 
     * @return mixed 
     */
    public static function getDailyRates($date)
    {
        if (isset($date)) {

            $sql = "SELECT code AS currency, rate FROM ExchangeRates WHERE onDate =  '" . $date . "' ";
            $result = AppCore::getDB()->sendQuery($sql);

            $numrow = mysqli_num_rows($result);

            if ($numrow === 0) {

                $sql = "SELECT code FROM CurrencyAdmin";
                $result = AppCore::getDB()->sendQuery($sql);

                $data = array();
                $counter = 0;

                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                    $counter++;
                }

                $codeInDb = array_column($data, 'code');
                $latestRates = ApiHandler::getLatestRates();
                $onDate = date('Y/m/d', $latestRates['timestamp']);

                foreach ($latestRates['rates'] as $key => $value)
                    foreach ($codeInDb as $code) if ($key == $code)
                        print($key . ' ' . $value . '<br>');
            } else {
                $data = [];

                while ($row = $result->fetch_assoc())
                    $data[] = $row;

                echo (json_encode($data));
            }
        } else echo 'The incorrect route!';
    }

    /**
     * Gets currency rate by code on selected date from ExchangeRates database table
     * 
     * @param $date
     * @param $code
     * 
     * @return mixed 
     */
    public static function getCurrencyRateByDate($date, $code)
    {
        if (isset($date) && isset($code)) {

            $sql = "SELECT code AS currency, rate FROM ExchangeRates WHERE onDate =  '" . $date . "' AND code = '" . $code . "'";
            $result = AppCore::getDB()->sendQuery($sql);

            $numrow = mysqli_num_rows($result);

            if ($numrow === 0) {

                $sql = "SELECT code FROM CurrencyAdmin";
                $result = AppCore::getDB()->sendQuery($sql);

                $data = array();

                while ($row = $result->fetch_assoc())
                    $data[] = $row;

                $latestRates = ApiHandler::getRatesHistory($date);

                foreach ($latestRates['rates'] as $key => $value)
                    if ($key == $code) print($key . ' ' . $value . '<br>');
            } else {
                $data = [];

                while ($row = $result->fetch_assoc())
                    $data[] = $row;

                echo (json_encode($data));
            }
        } else echo 'The incorrect route!';
    }

    /**
     * Gets rates by period from ExchangeRates database table
     * 
     * @param $fromDate
     * @param $toDate
     * 
     * @return mixed 
     */
    public static function getRatesByPeriod($fromDate, $toDate)
    {
        if (isset($fromDate) && isset($toDate)) {

            $fromDate = $_GET["fromDate"];
            $toDate = $_GET["toDate"];

            $sql = "SELECT code AS currency, rate, onDate AS date FROM ExchangeRates WHERE onDate >= '" . $fromDate . "' AND onDate <= '" . $toDate . "' ";

            $result = AppCore::getDB()->sendQuery($sql);

            $data = array();

            while ($row = $result->fetch_assoc()) $data[] = $row;

            echo (json_encode($data));
        } else echo 'The incorrect route!';
    }

    /**
     * Gets currency rate by date from ExchangeRates database table
     * 
     * @param $fromDate
     * @param $toDate
     * @param $code
     * 
     * @return mixed 
     */
    public static function getRateByPeriod($fromDate, $toDate, $code)
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
        } else echo 'The incorrect route';
    }

    /**
     * Gets exchange rates on selected day from API openexchangerates.org
     * 
     * @param $date
     * 
     * @return mixed 
     */
    public static function getDailyRatesAPI($date)
    {
        if (self::validateDate($date)) {

            $latestRates = ApiHandler::getRatesHistory($date);

            print 'Date: ' . $date . '<br>';

            foreach ($latestRates['rates'] as $key => $value)
                print($key . ' ' . $value . '<br>');

            return true;
        } else echo 'The invalid route, selected date format is incorrect!';
    }

    /**
     * Gets exchange rate on selected day for selected currncy from API openexchangerates.org
     * 
     * @param $date
     * @return mixed 
     */
    public static function getDailyRateAPI($date, $code)
    {
        if (self::validateDate($date)) {

            $latestRates = ApiHandler::getRatesHistory($date);

            // print 'Date: ' . $date . '<br>';

            // foreach ($latestRates['rates'] as $key => $value)
            //     print($key . ' ' . $value . '<br>');

            /////


            $sql = "SELECT code FROM CurrencyAdmin";
            $result = AppCore::getDB()->sendQuery($sql);

            $data = array();
            $counter = 0;

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
                $counter++;
            }

            $codeInDb = array_column($data, 'code');
            $latestRates = ApiHandler::getLatestRates();
            $onDate = date('Y/m/d', $latestRates['timestamp']);

            /////

            foreach ($latestRates['rates'] as $key => $value)
                foreach ($codeInDb as $code) if ($key == $code) HistoryHandler::getDailyRates($key, $value, $onDate);

            return true;
        } else echo 'The invalid route, selected date format is incorrect!';
    }


    /**
     * Validates date - parses a string into a new DateTime object according to the specified format
     * 
     * @param $date
     * @param $format
     * 
     * @return $date formatted according to given format 
     */
    public static function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) == $date;
    }
}
