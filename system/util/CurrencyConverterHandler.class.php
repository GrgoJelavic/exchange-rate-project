<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */
require_once('./system/util/ExchangeRatesHandler.class.php');

/**
 * )
 */
class CurrencyConverterHandler
{
    public static function convertCurrency($from, $to, $amount)
    {

        if (isset($from) && isset($to) && isset($amount)) {


            if ($from === 'USD') print 'Total: ' . (float)$amount * ExchangeRatesHandler::getSelectedRate($to) . ' ' .  $to  . '<br>';

            if ($to === 'USD') print  'Total: ' . (float)$amount / ExchangeRatesHandler::getSelectedRate($from) . ' ' .  $from . '<br>';

            // echo 'Currency exchange from ' . $amount . ' ' . $from . ' to ' .  $to . ' is equal to: ' . (float)$amount * ExchangeRatesHandler::getSelectedRate($from) . ' ' . $to;

            //if ($to ==  'USD') print (float)$amount / ExchangeRatesHandler::getSelectedRate($from);
        }
    }
}
