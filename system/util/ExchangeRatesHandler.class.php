<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('./system/util/AllCurrenciesHandler.class.php');


/**
 * Handles ExchangeRates database
 * 
 * @method 
 * @method 
 */
class ExchangeRatesHandler
{
    public static function checkForUpdateDb()
    {
        $sql = "SELECT * FROM ExchangeRates WHERE onDate='" . date("Y-m-d") . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($result) >= 1)  return false;
        else return true;
    }

    public static function checkForDailyUpdate()
    {
        $sql = "SELECT * FROM ExchangeRates  WHERE onDate='" . date("Y-m-d") . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        return (mysqli_num_rows($result));
    }

    public static function sameDayUpdate($code, $rate, $onDate)
    {
        $sql = "INSERT INTO ExchangeRates (code, rate, onDate)
                                SELECT * FROM (SELECT '" . $code . "', '" . $rate . "', '" . $onDate . "') AS temp
                                WHERE NOT EXISTS (
                                    SELECT code, onDate FROM ExchangeRates WHERE code = '" . $code . "' AND onDate = '" . date("Y-m-d") . "'
                                ) LIMIT 1;";

        AppCore::getDB()->sendQuery($sql);

        return true;
    }

    public static function insertLatestRates($code, $rate, $onDate)
    {
        $sql = "INSERT INTO ExchangeRates (code, rate, onDate) VALUES ('" . $code . "' , '" . $rate . "' , '" . $onDate . "')";

        AppCore::getDB()->sendQuery($sql);

        return true;
    }

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

        $latestRates = json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . APP_ID . "'"), true);

        $onDate = date('Y/m/d', $latestRates['timestamp']);

        if (self::checkForUpdateDb()) {

            foreach ($latestRates['rates'] as $key => $value) {

                foreach ($codeInDb as $code)
                    if ($key == $code) self::insertLatestRates($key, $value, $onDate);
            }
            echo "Latest rates inserted for date: $onDate.";
        } elseif (self::checkForDailyUpdate() != $counter) {

            foreach ($latestRates['rates'] as $key => $value) {

                foreach ($codeInDb as $code)
                    if ($key == $code) self::sameDayUpdate($key, $value, $onDate);
            }

            if ($counter < self::checkForDailyUpdate()) echo 'The database has already been updated for today!!';
            else echo "Same day update is for date: $onDate.";
        } else print 'The database has already been updated for today!';

        return true;
    }
}
