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

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define arrays
$f3->set('purposes', array('Multipurpose', 'Warship', 'Passenger Liner', 'Luxury'));

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

        //Add data to hive
        $f3->set('purp',$purpose);

        //If data is valid
        if(validForm()){

            //write data to session
            $_SESSION['purp'] = $purpose;
            //redirect to finalize
            $f3->reroute('/finalize');
        }
    }
    $view = new Template();
    echo $view->render('views/customize.html');
});
//Run F3
$f3->run();
