<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */


/**
 * Handles openexchangerates.org JSON API to get currency codes, latest rates and historical data
 * 
 * @method getLatestRates
 * @method getRatesHistory
 */
class ApiHandler
{
    /**
     * Gets latest data from openexchangerates.org JSON API 
     * 
     * @return mixed 
     */
    public static function getLatestRates()
    {
        return json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . APP_ID . "'"), true);
    }

    /**
     * Gets historical data from openexchangerates.org JSON API 
     * 
     * @return mixed — $fileContent
     */
    public static function getRatesHistory($date)
    {
        return json_decode(file_get_contents("https://openexchangerates.org/api/historical/$date.json?app_id='" . APP_ID . "'"), true);
    }
}
