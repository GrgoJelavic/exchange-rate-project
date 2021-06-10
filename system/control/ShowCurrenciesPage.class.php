<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

//require_once __DIR__ . "../model/CurrencyAdmin.class.php";
require_once('./system/util/ExchangeRatesHelper.class.php');

class ShowCurrenciesPage
{
    public function __construct()
    {
        $sql = "SELECT code FROM CurrencyAdmin";
        $result = AppCore::getDB()->sendQuery($sql);

        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        //$codeInDB = (json_encode($data));
        //$myArray = json_decode($codeInDB, true);;


        //var_dump($data); //valute u bazi
        echo '<br>';

        //print_r(($catIds));
        $codeInDb = array_column($data, 'code');

        // foreach ($codeInDb as $code) {
        //     print $code . '<br>';
        // }

        //ExchangeRate table
        // $dateFrom = date('Y/m/d', $latestRates['timestamp']);
        // $sql = "INSERT INTO Currency (code, rate, dateFrom) VALUES ('" . $key . "' , '" . $value . "', '" . $dateFrom . "'  )";

        //var_dump($myArray);
        $latestRates = json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . APP_ID . "'"), true);

        $onDate = date('Y/m/d', $latestRates['timestamp']);

        $dateNow = date('Y/m/d');
        //print $dateNow;

        if (ExchangeRatesHelper::checkIfAnyRateIsNull()) {
            foreach ($latestRates['rates'] as $key => $value) {

                foreach ($codeInDb as $code) {

                    if ($key == $code) {

                        // print ($onDate) . '<br>';
                        // print($key . ' ' . $value  . '<br>');


                        $sql2 = "INSERT INTO ExchangeRates (code, rate, onDate) VALUES ('" . $key . "' , '" . $value . "' , '" . $onDate . "')";

                        AppCore::getDB()->sendQuery($sql2);
                    }
                }
            }


            //echo ($key) . '<br>';




            // $sql2 = "INSERT INTO CurrencyAdmin(code) VALUES ('" . $key . "' )";

        } else if (ExchangeRatesHelper::checkIfAnyRateIsNull(
            // DbHelper::updateRate($value)
        )) {
        } else print 'The database has already been updated for today!';
    }
}
