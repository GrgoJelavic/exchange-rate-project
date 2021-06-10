<?php


error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * Interacts with database CurrencyAdmin
 * 
 * @method 
 * @method getCurrencvies
 */
class CurrencyAdminHelper
{
    public static function checkCurrencyInDb($code)
    {
        $sql = "SELECT code FROM CurrencyAdmin WHERE code='" . $code . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        $numrow = mysqli_num_rows($result);

        if ($numrow > 0) return false;

        return true;
    }

    public static function createCurrency($code)
    {
        $sql = "INSERT INTO CurrencyAdmin (code) VALUES ('" . $code . "')";

        AppCore::getDB()->sendQuery($sql);

        echo "$code is saved to Currency Admin";

        return true;
    }

    public static function deleteCurrency($code)
    {
        $sql = "DELETE FROM CurrencyAdmin WHERE code = '" . $code . "'";

        AppCore::getDB()->sendQuery($sql);

        echo "$code is deleted from Currency Admin!";

        return true;
    }

    public static function ReadCurrencies()
    {
        $sql = "SELECT code FROM CurrencyAdmin";

        $result = AppCore::getDB()->sendQuery($sql);

        $rows = array();

        while ($r = mysqli_fetch_assoc($result))
            $rows[] = $r;

        (sizeof($rows) === 0)
            ? print "There is no any currency saved in the database!"
            : print json_encode($rows);
    }

    public static function getCurrencies()
    {
        $sql = "SELECT code FROM CurrencyAdmin";

        $result = AppCore::getDB()->sendQuery($sql);

        while ($row = $result->fetch_assoc())
            $currencies[] = $row;

        return $currencies;
    }
}
