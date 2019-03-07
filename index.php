<?php

//turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//Required files
require_once 'vendor/autoload.php';
//Start session AFTER autoload
session_start();
//Create an instance of the Base class
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);



//Define a default route
$f3->route('GET|POST /', function() {
    //load a template
    $template = new Template();
    echo $template->render('views/home.html');
});

//sign up route
$f3->route('GET|POST /signup', function() {
    //load a template
    $template = new Template();
    echo $template->render('views/signUp.html');
});

//logged in homepage route
$f3->route('GET|POST /homepage', function() {
    //load a template
    $template = new Template();
    echo $template->render('views/loggedInHP.html');
});


//Run fat free
$f3->run();