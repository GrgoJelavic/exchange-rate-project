<?php

/**
 * Authors: Katija Juric, Grgo Jelavic
 * @copyright 2021 - Exchange rate REST API
 */

/** 
 * Database implementation
 */
class MySQLiDatabase
{
    public $MySQLi;
    protected $host;
    protected $user;
    protected $password;
    protected $database;

    /**
     * Creates database object, server connection and selects a database
     */
    public function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
        $this->selectDatabase();
    }

    /**
     * Connects to MySql server
     */
    public function connect()
    {
        $this->MySQLi = new MySQLi($this->host, $this->user, $this->password, $this->database);

        if (mysqli_connect_errno())
            throw new DatabaseException("Connecting to MySQL server '" . $this->host . "' failed ." . $this);
    }

    /**
     * Selects a MySql database 
     */
    public function selectDatabase()
    {
        if ($this->MySQLi->select_db($this->database) === false)
            throw new DatabaseException("Can not use database " . $this->database, $this);
    }

    /**
     * Sends a database quert to MySql database 
     * 
     * @param string $query a database query
     * @returns integer id of query result
     */
    public function sendQuery($query, $errorReporting = true)
    {
        $this->result = $this->MySQLi->query($query);

        if ($this->result === false && $errorReporting === true)
            throw new DatabaseException("Invalid SQL: " . $query . $this);

        return $this->result;
    }
}
