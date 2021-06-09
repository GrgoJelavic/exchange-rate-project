<?php

require_once('./system/util/AuthorizeCurrency.class.php');
require_once('./system/util/SaveCurrency.class.php');
require_once('./system/util/CheckCurrency.class.php');
require_once('./system/model/CurrencyAdmin.class.php');

class CreateCurrencyPage
{
    public function __construct()
    {
        if (AuthorizeCurrency::checkCurrency($_GET['code'])) {

            if (isset($_GET['curr'])) {

                $currency = $_GET['curr'];
                $code = $_GET['code'];

                if (CheckCurrency::checkCode($currency)) {
                    ($currency == $code)
                        ? SaveCurrency::saveToDB($currency)
                        : print('ISO code and currency must have same value to save !');
                } else echo 'Duplicate error - this currency was already saved!';
            }
        } else echo 'Unauthorized currency error - ISO code unknown!';
    }
}
