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

    function getSpecificModule($type, $id)
    {
        switch($type){
            case 'Engine':
                $sql = "SELECT * FROM Engines where engine_id = :id";
                break;
            case 'Hyperdrive':
                $sql = "SELECT * FROM Hyperdrives where hyperdrive_id = :id";
                break;
            case 'Generator':
                $sql = "SELECT * FROM Generators where generator_id = :id";
                break;
            case 'Shield':
                $sql = "SELECT * FROM Shields where shield_id = :id";
                break;
            case 'Purpose':
                $sql = "SELECT * FROM Purposes where purpose_id = :id";
                break;
            default:
                return false;

        }

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':id', $id);

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    function validateLogin($username, $password)
    {
        $sql = "SELECT username, password, id from login where username = :username and password = :password";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getName($id)
    {
        $sql = "SELECT fname, lname from users where id = :id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':id', $id);

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function isAdmin($id)
    {
        $sql = "SELECT is_admin from login where id = :id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':id', $id);

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function newUser($user)
    {
        $username = $user->getUsername();
        $password = $user->getPassword();


        //insert into login first

        //1. Define the query

        $sql = "insert into login values (null, FALSE, :username , :password, now(), now());";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);


        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $userId = $this->_dbh->lastInsertId();

        $this->newUserLogin($user, $userId);

    }

    private function newUserLogin($user, $userId)
    {
        $fname = $user->getFname();
        $lname = $user->getLname();
        $email = $user->getEmail();


        //insert into user next

        //1. Define the query

        $sql = "insert into users values (:userId, :fname , :lname, :email);";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':userId', $userId);
        $statement->bindParam(':fname', $fname);
        $statement->bindParam(':lname', $lname);
        $statement->bindParam(':email', $email);



        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $userId = $this->_dbh->lastInsertId();

    }

    function addShip($ship)
    {
        $name = $ship->getName();
        $gen = $ship->getGenerator();
        $eng = $ship->getEngine();
        $hyp = $ship->getHyperdrive();
        $sld = $ship->getShield();
        $col = $ship->getColor();
        $pow = $ship->getPower();
        $pri = $ship->getPrice();
        $id = $_SESSION['userID'];

        if(is_a($ship, 'BattleShip')) {
            $purp = 'p-0002';
        } elseif(is_a($ship, 'Liner')) {
            $purp = 'p-0003';
        } elseif(is_a($ship, 'Yacht')) {
            $purp = 'p-0004';
        } else {
            $purp = 'p-0001';
        }

        //insert into ships

        //1. Define the query


        $sql = "insert into ships values (null, :id, :shipName, :gen, :sld, :eng, :hyp, :col, :purp, :pri, :pow);";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters


        $statement->bindParam(':id', $id);
        $statement->bindParam(':shipName', $name);
        $statement->bindParam(':gen', $gen);
        $statement->bindParam(':sld', $sld);
        $statement->bindParam(':eng', $eng);
        $statement->bindParam(':hyp', $hyp);
        $statement->bindParam(':col', $col);
        $statement->bindParam(':purp', $purp);
        $statement->bindParam(':pri', $pri);
        $statement->bindParam(':pow', $pow);


        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $userId = $this->_dbh->lastInsertId();

    }


    function getShips()
    {
        $sql = "SELECT * FROM ships";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getUsers()
    {
        $sql = "SELECT * FROM user_admin";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);


        return $result;
    }

    function deleteUser($id)
    {

        $this->deleteLogin($id);

        $sql = "DELETE FROM users where id = :id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':id', $id);

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);



        return $result;
    }

    private function deleteLogin($id)
    {
        $sql = "DELETE FROM login where id = :id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':id', $id);

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function changeAdmin($id, $admin)
    {

        $sql = "UPDATE `login` SET `is_admin`= :admin WHERE id = :id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':id', $id);
        $statement->bindParam(':admin', $admin);

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);


        return $result;
    }
}