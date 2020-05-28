<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once("vendor/autoload.php");
require_once("model/data-layer.php");
require_once('model/validate.php');

session_start();

// Instantiate the F3 Base Class
$f3 = Base::instance();

// Default route
$f3->route('GET /', function()
{
    //echo '<h1>Welcome to my Dating Website!</h1>';

    $view = new Template();
    echo $view->render('views/home.html');
});

// Route to personal information
$f3->route('GET|POST /information', function($f3)
{
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //var_dump($_POST);
        // Validate first and last name
        if (!validName($_POST['fName']))
        {
            //Set an error variable in the F3 hive
            $f3->set('errors["fName"]', "Invalid first name");
        }
        if (!validName($_POST['lName']))
        {
            //Set an error variable in the F3 hive
            $f3->set('errors["lName"]', "Invalid last name");
        }
        if (!validAge($_POST['age']))
        {
            // Set an error variable in the F3 hive
            $f3->set('errors["age"]', "Invalid age, 18-118");
        }
        if (!validPhone($_POST['phone']))
        {
            // Set an error variable in the F3 hive
            $f3->set('errors["phone"]', "Invalid phone number (111-222-333)");
        }
        // Data is valid
        if (empty($f3->get('errors')))
        {
            //Store the data in the session array
            $_SESSION['fName'] = $_POST['fName'];
            $_SESSION['lName'] = $_POST['lName'];
            $_SESSION['age'] = $_POST['age'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['phone'] = $_POST['phone'];

            $f3->reroute('/information/profile');
        }
    }
    $f3->set('fName', $_POST['fName']);
    $f3->set('lName', $_POST['lName']);
    $f3->set('age', $_POST['age']);
    $f3->set('gender', $_POST['gender']);
    $f3->set('phone', $_POST['phone']);

    $view = new Template();
    echo $view->render('views/information.html');
});

// Route to profile
$f3->route('GET|POST /information/profile', function($f3)
{
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!validEmail($_POST['email']))
        {
            // Set an error variable in the F3 hive
            $f3->set('errors["email"]', "Invalid email");
        }
        // Data is valid
        if (empty($f3->get('errors')))
        {
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['seeking'] = $_POST['seeking'];
            $_SESSION['bio'] = $_POST['bio'];
            $_SESSION['email'] = $_POST['email'];

            $f3->reroute('/information/profile/interests');
        }
    }

    $f3->set('email', $_POST['email']);
    $view = new Template();
    echo $view->render('views/profile.html');
});

// Route to interests
$f3->route('GET|POST /information/profile/interests', function($f3)
{
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!validOutdoor($_POST['outdoor'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["outdoor"]', "Invalid");
        }
        if (!validIndoor($_POST['indoor'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["indoor"]', "Invalid");
        }

        if (empty($f3->get('errors')))
        {
            // store the data in the session array
            $_SESSION['outdoor'] = $_POST['outdoor'];
            $_SESSION['indoor'] = $_POST['indoor'];

            $f3->reroute('summary');
            session_destroy();
        }
    }
    $f3->set('outdoor', getOutdoor());
    $f3->set('outdoors', $_POST['outdoor']);
    $f3->set('indoor', getIndoor());
    $f3->set('indoors', $_POST['indoor']);

    $view = new Template();
    echo $view->render('views/interests.html');
});

// Route to summary
$f3->route('GET /summary', function()
{
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run F3
$f3->run();