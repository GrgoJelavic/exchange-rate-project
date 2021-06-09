<?php

class CheckCurrency
{
    public static function checkCode($code)
    {
        $sql = "SELECT code FROM CurrencyAdmin WHERE code='" . $code . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        $numrow = mysqli_num_rows($result);

        // ($numrow <= 1) ? true : false;

        if ($numrow > 0) {
            return false;
        }
        return true;
    }
}
