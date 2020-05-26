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

// Require the autoload file
require_once("vendor/autoload.php");
require_once("model/data-layer.php");

// Start a session AFTER requiring autoload.php
session_start();

// Instantiate the F3 Base Class
$f3 = Base::instance();
$validator = new Validate();
$controller = new Controller($f3);

// Default route
$f3->route('GET /', function()
{
    $GLOBALS['controller']->home();
});

// Route to personal information
$f3->route('GET|POST /information', function()
{
    $GLOBALS['controller']->information();
});

// Route to profile
$f3->route('GET|POST /information/profile', function($f3)
{
    $GLOBALS['controller']->profile();
});

// Route to interests
$f3->route('GET|POST /information/profile/interests', function($f3)
{
    $GLOBALS['controller']->interests();
});

// Route to summary
$f3->route('GET /information/profile/interests/summary', function($f3)
{
    $view = new Template();
    echo $view->render('views/summary.html');

    session_destroy();
});

// Run F3
$f3->run();
