<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */
require_once('./system/exception/AbstractException.class.php');

/**
 * Throws database exception
 */
class DatabaseException extends AbstractException
{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /** 
     * Gets auto functions from exception if there is any error
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
