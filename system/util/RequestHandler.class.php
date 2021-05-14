<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

/**
 * Creates page object
 */
class RequestHandler
{
    public function __construct($className)
    {
        $className = $className . 'Page';
        $classPath = '/opt/lampp/htdocs/exchange-rate-project/system/control/' . $className . '.class.php';

        if (!preg_match('/^[a-z0-9_]+$/i', $className) || !file_exists($classPath)) throw new Exception();

        // include class
        require_once($classPath);

        // //execute class
        if (!class_exists($className)) {
            throw new SystemException("Class '" . $className . "' not found");
        }
        new $className();
    }

    /**
     * Handles a HTTP request
     */
    public static function handle()
    {
        if (!empty($_GET['page']) || !empty($_POST['page']))
            new RequestHandler((!empty($_GET['page']) ? $_GET['page'] : $_POST['page']));
        else new RequestHandler('Index');
    }
}
