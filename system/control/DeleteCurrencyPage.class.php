<?php

require_once('./system/util/DeleteCurrency.class.php');
require_once('./system/util/CheckCurrency.class.php');

class DeleteCurrencyPage
{
    public function __construct()
    {
        if (isset($_GET['curr'])) {

            $currency = $_GET['curr'];

            (!CheckCurrency::checkCode($currency))
                ? DeleteCurrency::deleteFromDB($currency)
                : print('This currency was not in the database so there is nothing to delete!');
        }
    }
}
