<?php


error_reporting(E_ALL);
ini_set('display_errors', 'on');

class ViewController
{
    public function render($name)
    {
        require './system/view/' . $name . '.php';
    }
}
