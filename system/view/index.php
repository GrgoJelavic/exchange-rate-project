<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/AppCore.class.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/util/CurrencyAdminHandler.class.php');

?>
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange rate</title>
</head>

<body>
    <h1>Exchange rates currency converter</h1>
    <div>
        <form action="" method="get">

            <?php
            // echo '<br>';
            $app = new AppCore;


            foreach (CurrencyAdminHandler::printCurrencyCode() as $curr) {
                // var_dump($curr);
                echo '<br><option value="' . $curr . '">' . $curr . '</option>';
            }
            //$currencies = CurrencyAdminHandler::readCurrencies();
            //var_dump(CurrencyAdminHandler::readCurrencies());
            ?>
            <label for="from">From</label>
            <select name="from">
                <option value="none">Please select</option>

            </select>

            <label for="to">To</label>
            <select name="to">
                <option value="none">Please select</option>

            </select>

            <label for="amount">Enter amount</label>
            <input type="number">

            <input type="submit" value="Convert" name="convert">
        </form>
    </div>

</html> -->