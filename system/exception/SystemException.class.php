<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

/**
 * Throws system exceptions
 */
class SystemException extends Exception
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
