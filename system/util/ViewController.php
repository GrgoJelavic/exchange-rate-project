<?php


error_reporting(E_ALL);
ini_set('display_errors', 'on');

require('AbstractPage.class.php');
require_once('./system/util/HistoryHandler.class.php');

class ViewController
{
    public function render($name)
    {
        require './system/view/' . $name . '.php';
    }
}
