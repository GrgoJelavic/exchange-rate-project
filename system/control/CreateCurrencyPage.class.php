<?php

require_once('./system/util/AllCurrenciesHelper.class.php');
require_once('./system/util/CurrencyAdminHelper.class.php');
require_once('./system/model/CurrencyAdmin.class.php');

class CreateCurrencyPage
{
    public function __construct()
    {
        if (AllCurenciesHelper::validateCurrency($_GET['code'])) {

            $code = $_GET['code'];

            (CurrencyAdminHelper::checkCurrencyInDb($code))
                ? CurrencyAdminHelper::createCurrency($code)
                : 'Duplicate error - this currency was already saved!';
        } else echo 'Unauthorized currency error - currency ISO code unknown!';
    }
}
