<?php

class ReadCurrency
{
    public static function showCurrencyAdmin()
    {
        $sql = "SELECT code FROM CurrencyAdmin";

        $result = AppCore::getDB()->sendQuery($sql);

        $rows = array();

        while ($r = mysqli_fetch_array($result))
            $rows[] = $r;

        (sizeof($rows) === 0)
            ? print "There is no any currency saved in the database!"
            : print json_encode($rows);
    }
}
