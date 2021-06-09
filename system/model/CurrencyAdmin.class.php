<?php


class CurrencyAdmin
{
    protected $id;
    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
        //$this->getIdCodeFromDB();
    }

    public function setIsoCode($code)
    {
        $this->code = $code;
    }

    public function getIsoCode()
    {
        return $this->code;
    }

    // private function getIdCodeFromDB()
    // {
    //     $query = "SELECT * from AllCurrencies where code='$this->code'";

    //     $result = AppCore::getDB()->sendQuery($query);

    //     if (mysqli_num_rows($result) == 1) {

    //         while ($row = $result->fetch_assoc()) {

    //             $this->id = $row['id'];
    //         }
    //     }
    // }
}
