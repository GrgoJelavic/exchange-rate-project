<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */
require_once('./system/util/ExchangeRatesHandler.class.php');
/**
 * Handles currency conversion (convert exchange rates) with base USD using latest rates from exchangerates.org
 */
class CurrencyConverterHandler
{
    /**
     * Exchange rate - converts currency from USD to other currency, or other currencies to USD 
     */
    public static function convertCurrency($from, $to, $amount)
    {
        if (isset($from) && isset($to) && isset($amount)) {

            if (strtoupper($from) === 'USD') print 'Total: ' . (float)$amount * ExchangeRatesHandler::getSelectedRate($to) . ' ' .  strtoupper($to)  . '<br>';

            if (strtoupper($to) === 'USD') print  'Total: ' . (float)$amount / ExchangeRatesHandler::getSelectedRate($from) . ' ' .  strtoupper($from) . '<br>';

            if (strtoupper($from) !== 'USD' && strtoupper($to) !== 'USD')
                print  'Total: ' . (float)$amount / ExchangeRatesHandler::getSelectedRate($from) * ExchangeRatesHandler::getSelectedRate($to) . ' ' .  strtoupper($from) . '<br>';
        }
    }
}
