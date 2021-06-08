<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

/** 
 * Sets php handleException method for processing Exceptions.
 */
set_exception_handler(array('AppCore', 'handleException'));
