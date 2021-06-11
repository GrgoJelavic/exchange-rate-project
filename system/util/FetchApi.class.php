<?php

class FetchApi
{
    public function __construct()
    {
        // $latestRates = file_get_contents("'https://openexchangerates.org/api/latest.json?app_id='" . APP_ID . "'");

        // print(json_encode(json_decode($latestRates, JSON_FORCE_OBJECT), JSON_PRETTY_PRINT));
    }

    public static function fetchLatestRates()
    {
        $latestRates = json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . APP_ID . "'"), true);

        return $latestRates;
    }
}
