<?php
class FinalController
{
    private $_f3; //router
    private $_val; //validation


    public function __construct($f3)
    {
        $this->_f3 = $f3;
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
        $view = new Template();
        echo $view->render('views/login.html');
    }
    public function customShip($f3, $db)
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
            $f3->set('purp',$purpose);
            $f3->set('col',$color);
            $f3->set('shield',$shielding);
            $f3->set('gen',$generator);
            $f3->set('eng',$engine);
            $f3->set('hyper',$hyperdrive);
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
                $f3->reroute('/finalize');
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
