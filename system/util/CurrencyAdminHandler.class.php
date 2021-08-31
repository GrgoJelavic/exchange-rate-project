<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */
/**
 * Handles CurrencyAdmin database table for the currency administration (CRUD) 
 * 
 * @method checkCurrencyInDb
 * @method createCurrency
 * @method deleteCurrency
 * @method readCurrencies
 * @method getCurrencies
 */
class CurrencyAdminHandler
{
    /**
     * Checks if the currency iso code is in the database table CurrencyAdmin
     * 
     * @return bool
     */
    public static function checkCurrencyInDb($code)
    {
        $sql = "SELECT code FROM CurrencyAdmin WHERE code='" . $code . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        $numrow = mysqli_num_rows($result);

        if ($numrow > 0) return false;
        else return true;
    }

    /**
     * Creates the currency iso code in the database table CurrencyAdmin
     * 
     * @return void
     */
    public static function createCurrency($code)
    {
        $sql = "INSERT INTO CurrencyAdmin (code) VALUES ('" . $code . "')";

        AppCore::getDB()->sendQuery($sql);

        echo "$code is saved to Currency Admin";
    }

    /**
     * Deletes the currency iso code from the database table CurrencyAdmin
     * 
     * @return void
     */
    public static function deleteCurrency($code)
    {
        $sql = "DELETE FROM CurrencyAdmin WHERE code = '" . $code . "'";

        AppCore::getDB()->sendQuery($sql);

        echo "$code is deleted from Currency Admin!";
    }

    /**
     * Displays all the currencies iso code from the database table CurrencyAdmin
     * 
     * @return void
     */
    public static function readCurrencies()
    {
        $sql = "SELECT code FROM CurrencyAdmin";

        $result = AppCore::getDB()->sendQuery($sql);

        $rows = array();

        while ($r = mysqli_fetch_assoc($result))
            $rows[] = $r;

        (sizeof($rows) === 0)
            ? print "There isn't any currency saved in the database!"
            : print json_encode($rows);
    }

    /**
     * Gets all currencies iso code from the database table CurrencyAdmin
     * 
     * @return $currencies array
     */
    public static function getCurrencies()
    {
        $sql = "SELECT code FROM CurrencyAdmin";

        $result = AppCore::getDB()->sendQuery($sql);

        while ($row = $result->fetch_assoc())
            $currencies[] = $row;

        return $currencies;
    }
}
