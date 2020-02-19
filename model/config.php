<?php

// use your own credentials and add to home

define("DB_DSN", "mysql:dbname=emaretgr_interstellarEngineering");
define("DB_USERNAME", "emaretgr_interstellarEngineering_user");
define("DB_PASSWORD", '3eDPh!F=hTK[');

try {
    // Create a new PDO connection
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo "Connected";
} catch (PDOException $e){
    echo $e->getMessage();
}