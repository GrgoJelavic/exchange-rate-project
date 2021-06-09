<?php
class SaveCurrency
{

    public static function saveToDB($code)
    {
        $sql = "INSERT INTO CurrencyAdmin (code) VALUES ('" . $code . "')";

        AppCore::getDB()->sendQuery($sql);

        echo "$code is saved to Currency Admin";
    }
}
