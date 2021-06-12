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
     * IndexPage displays the project instructions for use
     */
    public function code()
    {
        echo 'Hello from Index Page! <br><br> Check the project instructions. <br><br> Currency Administration (crud): <br> 
        - Create: localhost/exchange-rate-project/index.php?page=CreateCurrency&code=USD <br> 
        - Read: localhost/exchange-rate-project/index.php?page=ReadCurrencies <br>
        - Delete: localhost/exchange-rate-project/index.php?page=DeleteCurrency&code=USD <br><br>
        
        Fetch latest rates from openexchangerates.org (json api) for all thr currencies stored in the database(based on usd): <br>
        - Fetch: localhost/exchange-rate-project/index.php?page=FetchRates <br><br>
        
        Historical exchange rates for the certain date or currency for the certain period: <br>
        - Daily rates: localhost/exchange-rate-project/index.php?page=RateHistory&date=2021-06-12 <br>
        - Rate on date: localhost/exchange-rate-project/index.php?page=RatesHistory&date=2021-06-11&currency=EUR <br>
        - Rate by period: localhost/exchange-rate-project/index.php?page=PeriodHistory&fromDate=2021-06-11&toDate=2021-06-12&currency=EUR
        <br><br>
    
        Currency exchange: <br>
        - Exchange: 
        <br><br>
        ';
    }
}
