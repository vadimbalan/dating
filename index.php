<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once("vendor/autoload.php");
require_once("model/data-layer.php");

session_start();

// Instantiate the F3 Base Class
$f3 = Base::instance();
$validator = new Validate();
$controller = new Controller($f3, $validator);

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
$f3->route('GET|POST /information/profile', function()
{
    $GLOBALS['controller']->profile();
});

// Route to interests
$f3->route('GET|POST /information/profile/interests', function($f3)
{
    $GLOBALS['controller']->interests();
});

// Route to summary
$f3->route('GET /summary', function()
{
    $GLOBALS['controller']->summary();
});

// Run F3
$f3->run();