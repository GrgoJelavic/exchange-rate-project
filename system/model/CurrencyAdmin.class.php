<?php

require_once __DIR__ . "/../model/CurrencyAdmin.php";

class CurrencyAdmin
{
    protected $id;
    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function setIsoCode($code)
    {
        $this->code = $code;
    }

    public function getIsoCode()
    {
        return $this->code;
    }
}
