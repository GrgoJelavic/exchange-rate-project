<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

/**
 * ApstractExceptions is base class for all exception classes  used in the  project and it includes apstract method show * 
 * @method code is abstract method which has to be implemented in subclasses (logic for all pages)
 */
abstract class AbstractException extends Exception
{
    /**
     * Logic has to be implemented for every page (subclass)
     */
    abstract function show();
}
