<?php


error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * DatabaseHelper interacts with database
 * 
 * @method saveCountry
 * @method deleteCountry
 * @method updateCountry
 * @method getCountries
 * 
 * @method getData
 * @method getDataLastDays
 * @method insertData
 * @method getUserIdQuery
 * @method convertToFloat
 */
class DatabaseHelper
{

    public static function saveCurrency($code)
    {
        $sql = "INSERT INTO CurrencyAdmin (code) VALUES ($code)";

        AppCore::getDB()->sendQuery($sql);

        return true;
    }

    public static function getCurrencies()
    {
        $sql = "SELECT code FROM CurrencyAdmin";

        $result = AppCore::getDB()->sendQuery($sql);

        while ($row = $result->fetch_assoc()) {
            $currencies[] = $row;
        }

        return $currencies;
    }
}
