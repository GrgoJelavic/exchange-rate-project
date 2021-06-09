<?php

class AuthorizeCurrency
{
    public static function checkCurrency($code)
    {
        if (isset($code)) {

            $sql = "SELECT * FROM AllCurrencies WHERE code = '" . $code . "' ";

            $result = AppCore::getDB()->sendQuery($sql);

            if (mysqli_num_rows($result) === 1) return true;
            else return false;
        } else return false;
    }
}
