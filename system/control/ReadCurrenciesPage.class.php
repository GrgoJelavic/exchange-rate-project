<?php

require_once('./system/util/CurrencyAdminHelper.class.php');
class ReadCurrenciesPage
{
    public function __construct()
    {
        CurrencyAdminHelper::ReadCurrencies();
    }
}
