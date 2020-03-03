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
            //echo "Connected";
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    function getModules($type)
    {
        switch($type){
            case 'Engine':
                $sql = "SELECT * FROM Engines";
                break;
            case 'Hyperdrive':
                $sql = "SELECT * FROM Hyperdrives";
                break;
            case 'Generator':
                $sql = "SELECT * FROM Generators";
                break;
            case 'Shield':
                $sql = "SELECT * FROM Shields";
                break;
            case 'Purpose':
                $sql = "SELECT * FROM Purposes";
                break;
            default:
                return false;

        }

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}