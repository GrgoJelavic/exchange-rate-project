<?php

class DeleteCurrency
{
    public static function deleteFromDB($code)
    {
        $sql = "DELETE FROM CurrencyAdmin WHERE code = '" . $code . "'";

        AppCore::getDB()->sendQuery($sql);

        echo "$code is deleted from Currency Admin!";
    }
}
