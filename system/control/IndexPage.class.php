<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');

/**
 * Index page presents the instructions
 */
class IndexPage extends AbstractPage
{
    /**
     * IndexPage displays the project instructions for use and updates latest rates 
     */
    public function code()
    {

        echo 'Hello from Exchange rate project Index Page! <br><br> Check the following instructions. <br><br> Currency Administration (crud): <br> 
        1) Create: <br> localhost/exchange-rate-project/index.php?page=CreateCurrency&code=CNY <br> 
        2) Read: <br> localhost/exchange-rate-project/index.php?page=ReadCurrencies <br>
        3) Delete: <br>localhost/exchange-rate-project/index.php?page=DeleteCurrency&code=CNY <br><br>
        
        Historical exchange rates:<br>
        4) Daily rates: <br> localhost/exchange-rate-project/index.php?page=RateHistory&date=2021-06-12 <br>
        5) Rate on date: <br> localhost/exchange-rate-project/index.php?page=RatesHistory&date=2021-06-11&code=EUR <br>
        6) Rate by period: <br> localhost/exchange-rate-project/index.php?page=PeriodHistory&fromDate=2021-06-11&toDate=2021-06-13&code=EUR
        <br><br>
    
        Currency exchange: <br>
        7) Exchange: <br>
        <br><br>
        ';
    }
}
