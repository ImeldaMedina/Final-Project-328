<?php
/*
 * Imelda Medina
 * Elijah Maret
 * 1/25/2020
 * 328/home.index.php
 */
//Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);
//Require autoload file
require("vendor/autoload.php");
//Instantiate F3
$f3 = Base:: instance();

$db = new FinalDatabase();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define arrays
$f3->set('purposes', array('Multipurpose', 'Warship', 'Passenger Liner', 'Luxury'));
$f3->set('colors', array('red', 'black', 'silver', 'white', 'gold', 'yellow'));
$f3->set('shieldings', array('s-0001-A','s-0001-B','s-0002-A','s-0002-B','s-0002-C','s-????-A','s-????-B'));
$f3->set('engines',array());
$f3->set('hyperdrives',array());
//define a default route
$f3->route('GET|POST /log', function(){
    $view = new Template();
    echo $view->render('views/home.html');
});
//define a default route for new user
$f3->route('GET|POST /new', function(){
    $view = new Template();
    echo $view->render('views/new-user.html');
});
$f3->route('GET|POST /customize', function($f3){
    //If form has been submitted, validate
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Get the data from the form
        $purpose = $_POST['purpose'];
        $color= $_POST['color'];
        $shielding = $_POST['shielding'];
        $engine = $_POST['engine'];
        $hyperdrive = $_POST['hyperdive'];
        //Add data to hive
        $f3->set('purp',$purpose);
        $f3->set('col',$color);
        $f3->set('shield',$shielding);
        $f3->set('eng',$engine);
        $f3->set('hyper',$hyperdrive);
        //If data is valid
        if(validForm()){

            //write data to session
            $_SESSION['purp'] = $purpose;
            $_SESSION['col'] = $color;
            $_SESSION['shield'] =$shielding;
            $_SESSION['eng'] =$engine;
            $_SESSION['hyper'] =$hyperdrive;
            //redirect to finalize
            $f3->reroute('/finalize');
        }
    }
    $view = new Template();
    echo $view->render('views/customize.html');
});
//Run F3
$f3->run();
