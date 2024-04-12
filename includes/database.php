<?php
class databaseConnection
{
    function connect()
    {
        $connect = new PDO("mysql:host=localhost; dbname=fresh", "root", "");
        return $connect;
    }
}
