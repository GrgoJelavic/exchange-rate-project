<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');


class FetchRatesPage
{
    public function __construct()
    {
        $latestRates = json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . APP_ID . "'"), true);

        foreach ($latestRates['rates'] as $key => $value) {
            print($key . ' ' . $value  . '<br>');

            //var_dump($value);


            //ExchangeRate table
            // $dateFrom = date('Y/m/d', $latestRates['timestamp']);
            // $sql = "INSERT INTO Currency (code, rate, dateFrom) VALUES ('" . $key . "' , '" . $value . "', '" . $dateFrom . "'  )";


            //AllCurrencies 

            // $sql2 = "INSERT INTO CurrencyAdmin(code) VALUES ('" . $key . "' )";

            // AppCore::getDB()->sendQuery($sql2);





            //CurrencyAdmin table CRUD

            //Create currency (insert currency code into database)
            // $sql2 = "INSERT INTO CurrencyAdmin(code) VALUES ('" . $key . "' )";

            // AppCore::getDB()->sendQuery($sql2);
        }



        //var_dump($latestRates);

        // print(json_encode(json_decode($latestRates, JSON_FORCE_OBJECT), JSON_PRETTY_PRINT));

        // print_r(date('m/d/Y', $latestRates['timestamp']));

        // echo date('d/m/Y', $latestRates['timestamp']);
    }
}
