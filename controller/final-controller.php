<?php
class FinalController
{
    private $_f3; //router
    private $_val; //validation
    private $_db; // database




    public function __construct($f3, $db)
    {
        $this->_f3 = $f3;
        $this->_db = $db;
        $this->_val = new FinalValidation($f3, $db);
    }


    public function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }
    public function newUser()
    {
        if (isset($_SESSION['username'])) {
            $this->_f3->reroute($this->_f3->get('SERVER.HTTP_REFERER'));
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password= $_POST['password'];

            $newUser = new NewUser($fname, $lname, $email, $username, $password);

            if ($this->_val->validForm()) { // if validated
                $this->_db->newUser($newUser);
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $fname.' '.$lname;
                //echo 'no';
                $this->_f3->reroute('/customize');

            } else {
                //Store login name in a session variable
                $this->_f3->set('newUser', $_POST);
            }
        }
        $view = new Template();
        echo $view->render('views/new-user.html');
    }
    public function login()
    {
        if (isset($_SESSION['username'])) {
            $this->_f3->reroute($this->_f3->get('SERVER.HTTP_REFERER'));
        }


        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password= $_POST['password'];

            $id = $this->_db->validateLogin($username, $password)['id'];

            $_SESSION['userID'] = $id;

            // is this an admin?
            $isAdmin = $this->_db->isAdmin($id)['is_admin'];
            if($isAdmin){
                $_SESSION['isAdmin'] = 'yes'; // activate admin mode
            }



            if (!$id) { // if not validated
                //echo 'no';
            } else {
                $_SESSION['username'] = $username;
                $name = $this->_db->getName($id);
                $name = $name['fname'].' '.$name['lname'];
                $_SESSION['name'] = $name;

                //Redirect to page 1
                $this->_f3->reroute('/customize');
            }
        }
        $view = new Template();
        echo $view->render('views/login.html');
    }


    public function customShip()
    {
        if (!isset($_SESSION['username'])) { // must be logged in
            $this->_f3->reroute('/login');
            echo "<script type='text/javascript'>alert('You must be logged in to place an order');</script>";
        }
        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $isValid = true;
            //Get the data from the form
            $purpose = $_POST['purpose'];
            if(!$this->_db->getSpecificModule('Purpose', $purpose)){
                $this->_f3->set("errors['purpose']", "What is this ship used for?");
                $isValid = false;
            }
            $color= $_POST['color'];
            $shielding = $_POST['shielding'];
            if(!$this->_db->getSpecificModule('Shield', $shielding)){
                $this->_f3->set("errors['shielding']", "a shielding module is required");
                $isValid = false;
            }
            $generator = $_POST['generator'];
            if(!$this->_db->getSpecificModule('Generator', $generator)){
                $this->_f3->set("errors['generator']", "a ship needs power!");
                $isValid = false;
            }
            $engine = $_POST['engine'];
            if(!$this->_db->getSpecificModule('Engine', $engine)){
                $this->_f3->set("errors['engine']", "a ship is rather useless without this");
                $isValid = false;
            }
            $hyperdrive = $_POST['hyperdrive'];
            if(!$this->_db->getSpecificModule('Hyperdrive', $hyperdrive)){
                $this->_f3->set("errors['hyperdrive']", "it will take a long time to cross stars without this");
                $isValid = false;
            }

            $power = $_POST['power'];
            $price = $_POST['price'];
            $name = $_POST['shipName'];

            if($purpose == 'p-0001'){
                $ship = new StarShip($name, $generator, $engine, $hyperdrive, $shielding, $color, $power, $price);
            } else if ($purpose = 'p-0002') {
                $ship = new BattleShip($name, $generator, $engine, $hyperdrive, $shielding, $color, $power, $price);
            } else if ($purpose = 'p-0003'){
                $ship = new Liner($name, $generator, $engine, $hyperdrive, $shielding, $color, $power, $price);
            } else if ($purpose = 'p-0004'){
                $ship = new Yacht($name, $generator, $engine, $hyperdrive, $shielding, $color, $power, $price);
            } else { // if invalid ship type
                $this->_f3->reroute('/customize');
            }


            //Add data to hive
            $this->_f3->set('ship', $ship);

            //If data is valid
            if($isValid){
                //write data to session
                $_SESSION['ship'] = $ship;
                $this->_db->addShip($ship);

                $this->_f3->reroute('/summary');
            }
        }
        $view = new Template();
        echo $view->render('views/customize.html');
    }


    public function summary()
    {
        $ship = $_SESSION['ship'];

        $this->_f3->set('shipName',$ship->getName());
        $this->_f3->set('col',$ship->getColor());
        $this->_f3->set('shield',$this->_db->getSpecificModule('Shield', $ship->getShield())['shield_name']);
        $this->_f3->set('gen', $this->_db->getSpecificModule('Generator', $ship->getGenerator())['generator_name']);
        $this->_f3->set('eng',$this->_db->getSpecificModule('Engine', $ship->getEngine())['engine_name']);
        $this->_f3->set('hyper',$this->_db->getSpecificModule('Hyperdrive', $ship->getHyperdrive())['hyperdrive_name']);


        $this->_f3->set('price', number_format(floatval($ship->getPrice()), 2));
        $this->_f3->set('power', number_format(floatval($ship->getPower())));



        if(is_a($ship, 'BattleShip')) {
            $this->_f3->set('purp', 'Battleship');
        } elseif(is_a($ship, 'Liner')) {
            $this->_f3->set('purp', 'Passenger Liner');
        } elseif(is_a($ship, 'Yacht')) {
            $this->_f3->set('purp', 'Space Yacht');
        } else {
            $this->_f3->set('purp', 'Multipurpose');
        }

        //If image was clicked print it
        if( $_POST['rateButton'] ) {
            $keys = array_keys($_POST['rateButton']);
            $clicked = $keys[0];
            echo "Image pressed: $clicked";
            //write data to session
            $_SESSION['rateButton'] = $clicked;
        }



        $view = new Template();
        echo $view->render('views/summary.html');
    }


    public function logout()
    {
        //this will wipe everything
        $_SESSION = array();
        session_destroy();

        $view = new Template();

        $this->_f3->reroute('/home');
    }


    public function admin()
    {

        if (!isset($_SESSION['username'])) { // must be logged in
            $this->_f3->reroute('/home');
        }

        if (!isset($_SESSION['isAdmin'])) { // must be admin
            $this->_f3->reroute('/home');
        }

        $ships = $this->_db->getShips();
        $users = $this->_db->getUsers();

        foreach ($ships as &$ship){
            $newString = number_format(floatval($ship['price']), 2);
            $ship['price'] = '$'.$newString;
            $ship['generator'] = $this->_db->getSpecificModule('Generator', $ship['generator'])['generator_name'];
            $ship['engine'] = $this->_db->getSpecificModule('Engine', $ship['engine'])['engine_name'];
            $ship['hyperdrive'] = $this->_db->getSpecificModule('Hyperdrive', $ship['hyperdrive'])['hyperdrive_name'];
            $ship['shield'] = $this->_db->getSpecificModule('Shield', $ship['shield'])['shield_name'];
        }


        $this->_f3->set('ships', $ships);
        $this->_f3->set('users', $users);

        $view = new Template();
        echo $view->render('views/admin.html');

    }


    public function updateUsers()
    {

        $users = $this->_db->getUsers();
        $admins = $_POST['admins'];

        foreach($users as $user){
            $id = $user['id'];
            if (in_array($user['id'], $admins)){
                $this->_db->changeAdmin($id, true);
            } else {
                $this->_db->changeAdmin($id, false);
            }
        }

        $this->_f3->reroute('/admin');

    }


}
