<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('./system/util/AllCurrenciesHandler.class.php');
require_once('./system/util/ApiHandler.class.php');


/**
 * Handles ExchangeRates database table
 * 
 * @method checkForUpdateDb
 * @method checkForDailyUpdate
 * @method sameDayUpdate
 * @method insertLatestRates
 * @method updateLatestRates
 * @method getSelectedRate
 */
class ExchangeRatesHandler
{
    /**
     * Checks if ExchangeRates database table is updated by date
     * 
     * @return bool 
     */
    public static function checkForUpdateDb()
    {
        $sql = "SELECT * FROM ExchangeRates WHERE onDate='" . date("Y-m-d") . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($result) >= 1)  return false;
        else return true;
    }

    /**
     * Checks size result of ExchangeRates database table which is updated by date 
     * 
     * @return mixed 
     */
    public static function checkForDailyUpdate()
    {
        $sql = "SELECT * FROM ExchangeRates WHERE onDate='" . date("Y-m-d") . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        return (mysqli_num_rows($result));
    }

    /**
     * Updates rates of Exchange rates on the same day (used if the currency is created after daily update) 
     * 
     * @return mixed 
     */
    public static function sameDayUpdate($code, $rate, $onDate)
    {
        $sql = "INSERT INTO ExchangeRates (code, rate, onDate)
                                SELECT * FROM (SELECT '" . $code . "', '" . $rate . "', '" . $onDate . "') AS temp
                                WHERE NOT EXISTS (
                                    SELECT code, onDate FROM ExchangeRates WHERE code = '" . $code . "' AND onDate = '" . date("Y-m-d") . "'
                                ) LIMIT 1;";

        AppCore::getDB()->sendQuery($sql);
    }

    /**
     * Inserts latest rates into ExchangeRates database table 
     * 
     * @return void
     */
    public static function insertLatestRates($code, $rate, $onDate)
    {
        $sql = "INSERT INTO ExchangeRates (code, rate, onDate) VALUES ('" . $code . "' , '" . $rate . "' , '" . $onDate . "')";

        AppCore::getDB()->sendQuery($sql);
    }

    /**
     * Update latest rates
     * 
     * @return void
     */
    public static function updateLatestRates()
    {
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

        if (self::checkForUpdateDb())
            foreach ($latestRates['rates'] as $key => $value)
                foreach ($codeInDb as $code) if ($key == $code) self::insertLatestRates($key, $value, $onDate);

        if (self::checkForDailyUpdate() != $counter)
            foreach ($latestRates['rates'] as $key => $value)
                foreach ($codeInDb as $code) if ($key == $code) self::sameDayUpdate($key, $value, $onDate);
    }

    /**
     * Gets selected rate on the certain date 
     * 
     * @param string
     * 
     * @return mixed 
     */
    public static function getSelectedRate($code)
    {
        $sql = "SELECT rate FROM ExchangeRates where code = ('" . $code . "') AND onDate = '" . date("Y-m-d") . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        $data = array();

        while ($row = $result->fetch_assoc()) $data[] = $row;

        (sizeof($data) === 0)
            ? print "Wrong value!"
            : true;

        $rateInDb = array_column($data, 'rate');

        foreach ($rateInDb as $rate) return number_format((float)$rate, 4, '.', '');
    }
}
