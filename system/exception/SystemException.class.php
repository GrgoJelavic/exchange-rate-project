<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */
require_once('/Applications/XAMPP/xamppfiles/htdocs/exchange-rate-project/system/exception/AbstractException.class.php');

/**
 * Throws system exception
 */
class SystemException extends AbstractException
{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    /** 
     * Returns auto functions message from exception if there is any error
     * 
     * @return string exception details
     */
    public function show()
    {
        return ("Error: " . $this->getMessage() .
            "File: " . $this->getFile() .
            "Line: " . $this->getLine() .
            "StackTrace: "  . $this->getTraceAsString());
    }
}
