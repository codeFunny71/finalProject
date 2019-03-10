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

//order a beer route
$f3->route('GET|POST /order', function() {
    //load a template
    $template = new Template();
    echo $template->render('views/orderBeer.html');
});

//view tab route
$f3->route('GET|POST /viewTab', function() {
    //load a template
    $template = new Template();
    echo $template->render('views/viewTab.html');
});

//pay tab route
$f3->route('GET|POST /payTab', function() {
    //load a template
    $template = new Template();
    echo $template->render('views/payTab.html');
});

//account information route
$f3->route('GET|POST /account', function() {
    //load a template
    $template = new Template();
    echo $template->render('views/accountInfo.html');
});


//Run fat free
$f3->run();