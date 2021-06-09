<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

//require_once __DIR__ . "../model/CurrencyAdmin.class.php";

class ShowCurrenciesPage
{
    public function __construct()
    {
        $sql = "SELECT * FROM CurrencyAdmin";
        $result = AppCore::getDB()->sendQuery($sql);

        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $json = (json_encode($data));
        //$myArray = json_decode($json, true);;
        echo ($json);



        $latestRates = json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . APP_ID . "'"), true);

        $sql = "SELECT code FROM CurrencyAdmin";
        $sql2 = AppCore::getDB()->sendQuery($sql);


        foreach ($latestRates['rates'] as $key => $value) {


            //print($key . ' ' . $value  . '<br>');

            //echo ($key) . '<br>';




            // $sql2 = "INSERT INTO CurrencyAdmin(code) VALUES ('" . $key . "' )";

            // AppCore::getDB()->sendQuery($sql2);
        }
    }
}
