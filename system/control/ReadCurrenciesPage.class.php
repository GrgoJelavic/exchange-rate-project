<?php

require_once('./system/util/ReadCurrency.class.php');

class ReadCurrenciesPage
{
    public function __construct()
    {
        ReadCurrency::showCurrencyAdmin();
    }
}
