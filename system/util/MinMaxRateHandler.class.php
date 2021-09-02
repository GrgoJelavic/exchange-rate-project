<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

/**
 * Handles min or max rate by certain period
 */
class MinMaxRateHandler
{
    /**
     * Gets min rate for certain period
     */
    public static function checkMinRate($fromDate, $toDate, $code)
    {

        if (isset($fromDate) && isset($toDate) && isset($code)) {

            $fromDate = $_GET["fromDate"];
            $toDate = $_GET["toDate"];
            $code = $_GET["code"];

            $sql = "SELECT code AS currency, MIN(rate) , onDate AS date FROM ExchangeRates WHERE onDate >= '" . $fromDate . "' AND onDate <= '" . $toDate . "' AND code = '" . $code . "'";

            $result = AppCore::getDB()->sendQuery($sql);

            $data = array();

            while ($row = $result->fetch_assoc()) $data[] = $row;

            echo (json_encode($data));
        } else echo 'The incorrect route';
    }

    public static function checkMaxRate($fromDate, $toDate, $code)
    {
        if (isset($fromDate) && isset($toDate) && isset($code)) {

            $fromDate = $_GET["fromDate"];
            $toDate = $_GET["toDate"];
            $code = $_GET["code"];

            $sql = "SELECT code AS currency, MAX(rate), onDate AS date FROM ExchangeRates WHERE onDate >= '" . $fromDate . "' AND onDate <= '" . $toDate . "' AND code = '" . $code . "'";

            $result = AppCore::getDB()->sendQuery($sql);

            $data = array();

            while ($row = $result->fetch_assoc()) $data[] = $row;

            echo (json_encode($data));
        } else echo 'The incorrect route';
    }
}
