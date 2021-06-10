<?php


error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * DatabaseHelper interacts with database
 * 
 * @method saveCurrency
 * @method getCurrencies
 */
class ExchangeRatesHelper
{

    public static function checkForUpdateDb()
    {
        $sql = "SELECT * FROM ExchangeRates WHERE onDate='" . date("Y-m-d") . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($result) >= 1)  return false;
        else return true;
    }

    public static function checkIfAnyRateIsNull()
    {
        $sql = "SELECT rate FROM ExchangeRates WHERE rate IS NULL";

        $result = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($result) < 1)  return false;
        else return true;
    }

    public static function updateRate($rate)
    {
        $sql = "UPDATE ExchangeRates 
                SET rate = {$rate}, onDate = '" . date("Y-m-d") . "'
                WHERE onDate is NULL";

        AppCore::getDB()->sendQuery($sql);
    }
}
