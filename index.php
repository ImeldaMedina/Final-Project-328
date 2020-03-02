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

//Instantiate controller object
$controller= new FinalController($f3);

$f3->route('GET /', function(){
    $GLOBALS['controller']->home();

});
$f3->route('GET /home', function(){
    $GLOBALS['controller']->home();
});

//define a default route for new user
$f3->route('GET|POST /newUser', function(){
    $GLOBALS['controller']->newUser();
});
//login page route
$f3->route('GET|POST /login', function(){
    $GLOBALS['controller']->login();
});
$f3->route('GET|POST /customize', function($f3){
    $GLOBALS['controller']->customShip($f3);
});
//get the results printed
$f3->route('GET|POST /summary', function(){
    $GLOBALS['controller']->summary();
//this will wipe everything
    session_destroy();
    $_SESSION = array();
});
//Run F3
$f3->run();
