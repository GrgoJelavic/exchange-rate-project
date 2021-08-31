<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require_once('./system/util/ApiHandler.class.php');

/**
 * Handles AllCurrencies database table which is used for the currency iso code validation
 * 
 * @method insertAllCurrencies
 * @method validateCurrency
 * @method checkForAllCurrencies
 */
class AllCurenciesHandler
{
    /**
     * Inserts all currencies into table AllCurrencies (if database table is empty) 
     */
    public static function insertAllCurrencies()
    {
        $latestRates = ApiHandler::getLatestRates();

        foreach ($latestRates['rates'] as $key) {

            $sql = "INSERT INTO AllCurrencies(code) VALUES ('" . $key . "' )";

            AppCore::getDB()->sendQuery($sql);
        }
    }

    /**
     * Validates currency ISO code
     * 
     * @return bool|void
     */
    public static function validateCurrency($code)
    {
        if (isset($code)) {

            $sql = "SELECT * FROM AllCurrencies WHERE code = '" . $code . "' ";

            $result = AppCore::getDB()->sendQuery($sql);

            if (mysqli_num_rows($result) === 1) return true;
            else return false;
        } else echo 'Incorrect route!';
    }

    /**
     * Checks if AllCurrencies database table is empty
     * 
     * @return bool
     */
    public static function checkForAllCurrencies()
    {
        $sql = "SELECT * FROM AllCurrencies";

        $result = AppCore::getDB()->sendQuery($sql);

        $numrow = mysqli_num_rows($result);

        if ($numrow < 1) return false;
        else return true;
    }
}
