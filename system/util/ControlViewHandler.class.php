<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

/**
 * Handles view control
 */
class ControlViewHandler
{
    public function __construct()
    {
        $this->view = new ViewController();
    }
}
