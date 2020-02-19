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

//define a default route
$f3->route('GET /', function(){
    $view = new Template();
    echo $view->render('views/home.html');
});
//define a default route for new user
$f3->route('GET /', function(){
    $view = new Template();
    echo $view->render('views/new-user.html');
});
//Run F3
$f3->run();
