<?php

class AllCurenciesHelper
{
    public static function validateCurrency($code)
    {
        if (isset($code)) {

            $sql = "SELECT * FROM AllCurrencies WHERE code = '" . $code . "' ";

            $result = AppCore::getDB()->sendQuery($sql);

            if (mysqli_num_rows($result) === 1) return true;
            else return false;
        } else return false;
    }

    public static function insertAllCurrencies()
    {
        $latestRates = json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . APP_ID . "'"), true);

        foreach ($latestRates['rates'] as $key => $value) {

            $sql = "INSERT INTO AllCurrencies(code) VALUES ('" . $key . "' )";

            AppCore::getDB()->sendQuery($sql);
        }
    }
}
