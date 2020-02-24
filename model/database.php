<?php


$user = posix_getpwuid(posix_getuid());
$userDir = $user['dir'];
require_once ("$userDir/config.php");

class FinalDatabase
{
    //PDO object
    private $_dbh;

    function __construct()
    {
        try {
            // Create a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "Connected";
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}