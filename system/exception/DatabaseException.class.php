<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

/**
 * Throws database exceptions
 */
class DatabaseException extends Exception
{
    public function __construct($message = "", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /** 
     * Gets auto functions from exception if there is any error
     */
    public function show()
    {
        return ("Error: " . $this->getMessage() .
            "File: " . $this->getFile() .
            "Line: " . $this->getLine() .
            "StackTrace: "  . $this->getTraceAsString());
    }
}
