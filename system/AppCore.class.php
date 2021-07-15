<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/core.functions.php');
require('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/util/RequestHandler.class.php');
require('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/exception/SystemException.class.php');

/**
 * Main class of the application
 */
class AppCore
{
    protected static $dbObj;

    public function __construct()
    {
        $this->initDB();
        $this->initOptions();
        RequestHandler::handle();
    }

    /**
     * Handles exceptions
     */
    public static function handleException($e)
    {
        // echo "Uncaught exceptionnn: ", $e->getMessage(), "\n";
        echo ("Error: " . $e->getMessage() . "File: " . $e->getFile() . "Linija: " . $e->getLine() . "StackTrace: "  . $e->getTraceAsString());
    }

    /**
     * Stores databese object into varibale
     */
    public function initDB()
    {
        require('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/config.inc.php');
        require('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/model/MySQLiDatabase.class.php');

        self::$dbObj = new MySQLiDatabase(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    /**
     * Gets database object
     * 
     * @returns object of database
     */
    public static final function getDB()
    {
        return self::$dbObj;
    }

    /**
     * Inits application settings
     */
    public function initOptions()
    {
        require('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/options.inc.php');
    }

    /**
     * Loads all classes from util folder
     * 
     * @param string class name
     */
    public static function autoload($className)
    {
        file_exists($className)
            ?  require_once '.system/util/' . $className . '.php'
            : print_r('Class name does not exists!');
    }
}
