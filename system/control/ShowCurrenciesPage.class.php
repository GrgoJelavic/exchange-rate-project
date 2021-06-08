<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once __DIR__ . "/../model/CurrencyAdmin.class.php";

class ShowCurrenciesPage
{
    public function __construct()
    {
        // $sql = "SELECT * FROM CurrencyAdmin";
        // $result = AppCore::getDB()->sendQuery($sql);

        // $data = array();

        // while ($row = $result->fetch_assoc()) {
        //     $data[] = $row;
        // }

        // echo (json_encode($data));
    }
}
