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

session_start();

//Instantiate F3
$f3 = Base:: instance();

$db = new FinalDatabase();


//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define arrays
$f3->set('purposes', $db->getModules("Purpose"));
$f3->set('colors', array('red', 'black', 'silver', 'white', 'gold', 'yellow'));
$f3->set('shieldings', $db->getModules("Shield"));
$f3->set('generators', $db->getModules("Generator"));
$f3->set('engines', $db->getModules("Engine"));
$f3->set('hyperdrives', $db->getModules("Hyperdrive"));

$f3->set('guest', 'Guest');

//Instantiate controller object
$controller= new FinalController($f3, $db);

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

$f3->route('GET|POST /customize', function(){
    $GLOBALS['controller']->customShip();
});

//
$f3->route('GET|POST /summary', function(){
    $GLOBALS['controller']->summary();
});

// this will wipe everything
$f3->route('GET|POST /logout', function(){
    $GLOBALS['controller']->logout();
});

$f3->route('GET /test', function(){
    global $db;
    echo '<pre>';
    var_dump ($db->getName(4));
    //var_dump($db->validateLogin("Admin", "dm1n"));

    echo '</pre>';

    echo ( $db->getSpecificModule('Generator', 'g-0003-B')['generator_name']);

    echo $_SESSION['username'];
});
//Run F3
$f3->run();
