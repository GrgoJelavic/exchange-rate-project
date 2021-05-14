<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

require('./system/core.functions.php');
require('./system/util/RequestHandler.class.php');

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
    public static function handleException(Exception $e)
    {
    }

    /**
     * Stores databese object into varibale
     */
    public function initDB()
    {
        require('./system/config.inc.php');
        require('./system/model/MySQLiDatabase.class.php');

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
        require('./system/options.inc.php');
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
