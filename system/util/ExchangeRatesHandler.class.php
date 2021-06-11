<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * 
 * 
 */
class ExchangeRatesHandler
{
    public static function checkForUpdateDb()
    {
        $sql = "SELECT * FROM ExchangeRates WHERE onDate='" . date("Y-m-d") . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($result) >= 1)  return false;
        else return true;
    }

    public static function updateLatestRates()
    {
        $sql = "SELECT code FROM CurrencyAdmin";
        $result = AppCore::getDB()->sendQuery($sql);

        $data = array();
        $counter = 0;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
            $counter++;
        }

        $codeInDb = array_column($data, 'code');

        $latestRates = json_decode(file_get_contents("https://openexchangerates.org/api/latest.json?app_id='" . APP_ID . "'"), true);

        $onDate = date('Y/m/d', $latestRates['timestamp']);

        // var_dump(self::checkIfAnyRateIsNull());

        print $counter;
        print(self::checkForSize());

        if (self::checkForUpdateDb()) {

            foreach ($latestRates['rates'] as $key => $value) {

                foreach ($codeInDb as $code) {

                    if ($key == $code) {

                        $sql2 = "INSERT INTO ExchangeRates (code, rate, onDate) VALUES ('" . $key . "' , '" . $value . "' , '" . $onDate . "')";

                        AppCore::getDB()->sendQuery($sql2);
                    }
                }
            }

            print 'hello from check for update';
        } elseif (self::checkForSize() != $counter) {

            print 'hello from check for size';


            $counter = 0;

            foreach ($latestRates['rates'] as $key => $value) {

                foreach ($codeInDb as $code) {

                    print($key . ' ' . $code);
                    // $counter++;
                    // print $counter;


                    if ($key == $code) continue;
                    else {

                        $sql =

                            " INSERT INTO ExchangeRates (code, rate, onDate) 
                            SELECT * FROM (SELECT '" . $key . "' AS  code, '" . $value . "' AS rate, '" . date("Y-m-d") . "' AS onDate) AS temp
                            WHERE NOT EXISTS (SELECT code FROM CurrencyAdmin WHERE code = '" . $code . "') ";


                        AppCore::getDB()->sendQuery($sql);
                    }
                }
            }
        } else print 'The database has already been updated for today!';
    }

    public static function checkForSize()
    {
        $sql = "SELECT * FROM ExchangeRates  WHERE onDate='" . date("Y-m-d") . "'";

        $result = AppCore::getDB()->sendQuery($sql);

        return (mysqli_num_rows($result));
    }

    // public static function checkIfAnyRateIsNull()
    // {
    //     $sql = "SELECT rate FROM ExchangeRates WHERE rate IS NULL";

    //     $result = AppCore::getDB()->sendQuery($sql);

    //     if (mysqli_num_rows($result) < 1)  return false;
    //     else return true;
    // }

    public static function updateRateIfNull($rate)
    {
        $sql = "UPDATE ExchangeRates 
                SET rate = {$rate}, onDate = '" . date("Y-m-d") . "'
                WHERE onDate is NULL";

        AppCore::getDB()->sendQuery($sql);
    }
}
