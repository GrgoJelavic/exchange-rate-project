<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */
/**
 * Index page presents the instructions
 */
class IndexPage
{
    public function __construct()
    {
        echo 'Hello from Index Page! <br><br> Check the project instructions. <br><br> Currency Administration (crud): <br> 
        - Create: localhost/exchange-rate-project/index.php?page=CreateCurrency&curr=USD&code=USD<br> 
        - Read: localhost/exchange-rate-project/index.php?page=ReadCurrencies <br>
        - Delete: localhost/exchange-rate-project/index.php?page=DeleteCurrency&currency=USD <br><br>
        
        Fetch latest rates from openexchangerates.org (json api): <br>
        - Fetch Rates: localhost/exchange-rate-project/index.php?page=FetchRates';
    }
}
