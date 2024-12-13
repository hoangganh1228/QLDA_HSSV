<?php
class Model extends Database {
    protected $database;

    function __construct()
    {
        $this->database = new Database();
    }
}