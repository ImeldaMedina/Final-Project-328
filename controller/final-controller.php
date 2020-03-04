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

        //If form has been submitted, validate
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get the data from the form
            $purpose = $_POST['purpose'];
            $color= $_POST['color'];
            $shielding = $_POST['shielding'];
            $generator = $_POST['generator'];
            $engine = $_POST['engine'];
            $hyperdrive = $_POST['hyperdive'];

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
                $_SESSION['purp'] = $purpose;
                $_SESSION['col'] = $color;
                $_SESSION['shield'] =$shielding;
                $_SESSION['gen'] =$generator;
                $_SESSION['eng'] =$engine;
                $_SESSION['hyper'] =$hyperdrive;
                //redirect to finalize
                $this->_f3->reroute('/finalize');
            }
        }
        $view = new Template();
        echo $view->render('views/customize.html');
    }

    public function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');
        //this will wipe everything
        session_destroy();
        $_SESSION = array();
    }
}
