<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('AbstractPage.class.php');

/**
 * Index page presents the project instructions
 */
class IndexPage extends AbstractPage
{
    /**
     * IndexPage displays the project instructions
     * 
     * @method code implements page logic
     */
    public function code()
    {
        echo '<b>Hello from  Index Page of Exchange rate REST API project!</b> <br><br> Check the following instructions: <br><br><br><b>I. Currency Administration (CRUD):</b> <br><br>
        1) Create: <br> localhost/exchange-rate-project/index.php?page=CreateCurrency&code=CNY <br><br> 
        2) Read: <br> localhost/exchange-rate-project/index.php?page=ReadCurrencies <br><br> 
        3) Delete: <br>localhost/exchange-rate-project/index.php?page=DeleteCurrency&code=CNY <br><br><br> 
        <b>II. Historical exchange rates:</b><br><br> 
        4) Daily rates: <br> localhost/exchange-rate-project/index.php?page=DailyHistory&date=2021-06-14 <br><br>
        5) Rate on date: <br> localhost/exchange-rate-project/index.php?page=RateHistory&date=2021-06-11&code=EUR <br><br> 
        6) Rate by period: <br> localhost/exchange-rate-project/index.php?page=PeriodHistory&fromDate=2021-06-11&toDate=2021-06-14&code=EUR<br><br>
        7) Rates by period: <br> localhost/exchange-rate-project/index.php?page=PeriodHistory&fromDate=2021-06-11&toDate=2021-06-14<br><br><br>
        <b>III. Currency exchange:</b> <br><br> 
        8) Exchange: <br> localhost/exchange-rate-project/index.php?page=CurrencyConverter&from=USD&to=HRK&amount=100
        <br>
        ';
    }
}
