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
$f3->route('GET /information', function()
{
    $view = new Template();
    echo $view->render('views/information.html');
});

// Run F3
$f3->run();
