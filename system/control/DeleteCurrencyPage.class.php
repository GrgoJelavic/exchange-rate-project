<?php

require_once('./system/util/CurrencyAdminHelper.class.php');


class DeleteCurrencyPage
{
    public function __construct()
    {
        if (isset($_GET['curr'])) {

            $code = $_GET['curr'];

            (!CurrencyAdminHelper::checkCurrencyInDb($code))
                ? CurrencyAdminHelper::deleteCurrency($code)
                : print($code . ' was not in the database so can not be deleted!');
        }
    }
}
