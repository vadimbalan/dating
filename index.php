<?php
/*
 * Name: Vadim Balan
 * Date: 04/29/2020
 * Description: This file is the index file that handles all the routing of the
 * dating website.
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// Require the autoload file
require_once("vendor/autoload.php");
require_once("model/data-layer.php");

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
        // Testing
        //var_dump($_POST);

        // Data is valid
        // Store the data in the session array
        $_SESSION['fName'] = $_POST['fName'];
        $_SESSION['lName'] = $_POST['lName'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['bio'] = $_POST['bio'];


        // Redirect to profile page
        $f3->reroute('/information/profile');
    }

    $view = new Template();
    echo $view->render('views/information.html');
});

// Route to profile
$f3->route('GET|POST /information/profile', function($f3)
{
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Testing
        //var_dump($_POST);

        // Data is valid
        // Store the data in the session array
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['bio'] = $_POST['bio'];

        // Redirect to profile page
        $f3->reroute('/information/profile/interests');
    }
    $view = new Template();
    echo $view->render('views/profile.html');
});

// Route to interests
$f3->route('GET|POST /information/profile/interests', function($f3)
{
    $indoor = getIndoor();
    $outdoor = getOutdoor();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Testing
        //var_dump($_POST);

        // Data is valid
        // Store the data in the session array
        $_SESSION['indoor'] = $_POST['indoor'];
        $_SESSION['outdoor'] = $_POST['outdoor'];


        // Redirect to profile page
        $f3->reroute('/information/profile/interests/summary');
    }
    $f3->set('indoor', $indoor);
    $f3->set('outdoor', $outdoor);
    $view = new Template();
    echo $view->render('views/interests.html');
});

// Route to summary
$f3->route('GET /information/profile/interests/summary', function($f3)
{
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run F3
$f3->run();
