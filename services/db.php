<?php

/**
 * 
 */
class DB
{
    static function initialize()
    {
        include './config.php';
        $conn =  new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>