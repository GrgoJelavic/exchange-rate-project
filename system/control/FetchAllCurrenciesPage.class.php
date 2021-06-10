<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('./system/util/AllCurrenciesHelper.class.php');


class FetchAllCurrenciesPage
{
    public function __construct()
    {
        AllCurenciesHelper::insertAllCurrencies();
    }
}
