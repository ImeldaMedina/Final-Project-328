<?php

//config-student.php

define("DB_DSN", "mysql:dbname=imedinag_src");
define("DB_USERNAME", "imedinag_srcuser");
define("DB_PASSWORD", '{B2I$^D~_o@3');

try {
    // Create a new PDO connection
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo "Connected";
} catch (PDOException $e){
    echo $e->getMessage();
}