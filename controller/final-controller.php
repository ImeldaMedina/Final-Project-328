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
        $this->_val = new FinalValidation();
    }

    public function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }
    public function newUser()
    {
        $view = new Template();
        echo $view->render('views/new-user.html');
    }
    public function login()
    {

        if (isset($_SESSION['username'])) {
            $this->_f3->reroute('/home');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = $_POST['username'];
            $password= $_POST['password'];

            //echo $_SESSION['username'];

            if (!$this->_db->validateLogin($username, $password)) { // if not validated
                echo 'no';
            } else {
                $_SESSION['username'] = $username;
                //Store login name in a session variable
                $this->_f3->reroute('/home');
                //Redirect to page 1
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
            //Get the data from the form
            $purpose = $_POST['purpose'];
            $color= $_POST['color'];
            $shielding = $_POST['shielding'];
            $generator = $_POST['generator'];
            $engine = $_POST['engine'];
            $hyperdrive = $_POST['hyperdive'];

            if($purpose == 'p-0001'){
                $ship = new StarShip('testName', $generator, $engine, $hyperdrive, $shielding, $color);
            } else if ($purpose = 'p-0002') {
                $ship = new BattleShip('testName', $generator, $engine, $hyperdrive, $shielding, $color);
            } else if ($purpose = 'p-0003'){
                $ship = new Liner('testName', $generator, $engine, $hyperdrive, $shielding, $color);
            } else if ($purpose = 'p-0004'){
                $ship = new Yacht('testName', $generator, $engine, $hyperdrive, $shielding, $color);
            } else { // if invalid ship type
                $this->_f3->reroute('/finalize');
            }

            //Add data to hive
            $this->_f3->set('purp',$purpose);
            $this->_f3->set('col',$color);
            $this->_f3->set('shield',$shielding);
            $this->_f3->set('gen',$generator);
            $this->_f3->set('eng',$engine);
            $this->_f3->set('hyper',$hyperdrive);

            //If data is valid
            if(validForm()){

                //write data to session

                $_SESSION['ship'] = $ship;

                /*
                $_SESSION['purp'] = $purpose;
                $_SESSION['col'] = $color;
                $_SESSION['shield'] =$shielding;
                $_SESSION['gen'] =$generator;
                $_SESSION['eng'] =$engine;
                $_SESSION['hyper'] =$hyperdrive;
                */
                //redirect to finalize
                if(is_a($ship, 'BattleShip')) {
                    $this->_f3->reroute('/finalize');
                }
                if(is_a($ship, 'Liner')) {
                    $this->_f3->reroute('/finalize');
                }
                if(is_a($ship, 'Yacht')) {
                    $this->_f3->reroute('/finalize');
                }

                $this->_f3->reroute('/summary');
            }
        }
        $view = new Template();
        echo $view->render('views/customize.html');
    }

    public function summary()
    {
        if (!isset($_SESSION['username'])) { // must be logged in
            $this->_f3->reroute('/login');
            echo "<script type='text/javascript'>alert('You must be logged in to place an order');</script>";
        }

        $view = new Template();
        echo $view->render('views/summary.html');
    }

    public function logout()
    {
        //this will wipe everything
        $_SESSION = array();
        //session_destroy();

        $view = new Template();
        echo $view->render('views/home.html');

        echo "<script type='text/javascript'>alert('you have been logged out');</script>";
    }



}
