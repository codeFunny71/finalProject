<?php

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Required files
require_once 'vendor/autoload.php';
require_once 'model/database.php';
//Start session AFTER autoload
session_start();
//Create an instance of the Base class
$f3 = Base::instance();

//connect to db
$data = new Database();
$db = $data->connect();

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
    //create an empty session array to hold values
    $_SESSION = array();

    if (!empty($_POST) && isset($_POST['submitSignUp']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $newCustomer = new Customer($fname, $lname, $address, $city, $state, $zip, $phone, $email, $password);

        $_SESSION['newCustomer'] = $newCustomer;

        Database::insertCustomer($newCustomer);

    }






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

//admin login route
$f3->route('GET|POST /adminLogin', function() {
    //load a template
    $template = new Template();
    echo $template->render('views/adminLogin.html');
});

//admin homepage route
$f3->route('GET|POST /admin', function() {
    //load a template
    $template = new Template();
    echo $template->render('views/admin.html');
});


//Run fat free
$f3->run();