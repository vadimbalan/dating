<?php

class Controller
{
    private $_f3; // router

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    public function home()
    {
        //echo '<h1>Welcome to my Dating Website!</h1>';

        $view = new Template();
        echo $view->render('views/home.html');
    }

    public function information()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //var_dump($_POST);
            // Validate first and last name
            if (!$GLOBALS['validator']->validFirst($_POST['fName']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["first]', "Invalid first name");
            }
            if (!$GLOBALS['validator']->validLast($_POST['lName']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["last"]', "Invalid last name");
            }
            if (!$GLOBALS['validator']->validAge($_POST['age']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["age"]', "Invalid age");
            }
            if (!$GLOBALS['validator']->validPhone($_POST['phone']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["phone"]', "Invalid phone number");
            }
            // Data is valid
            if (empty( $this->_f3->get('errors')))
            {
                // Create an object
                $information = new Information();
                $information->setFirst($_POST['fName']);
                $information->setLast($_POST['lName']);
                $information->setAge($_POST['age']);
                $information->setPhone($_POST['phone']);

                // Store the object in the session array
                $_SESSION['information'] = $information;

                // Redirect to condiments page
                $this->_f3->reroute('/information/profile');
            }
        }

        $this->_f3->set('fName', $_POST['fName']);
        $this->_f3->set('lName', $_POST['lName']);
        $this->_f3->set('age', $_POST['age']);
        $this->_f3->set('phone', $_POST['phone']);
        $view = new Template();
        echo $view->render('views/information.html');
    }

    public function profile()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (!$GLOBALS['validator']->validEmail($_POST['email']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["email"]', "Invalid email address");
            }
            // Data is valid
            if (empty( $this->_f3->get('errors')))
            {
                // Create an object
                $information = new Information();
                $information->setEmail($_POST['email']);

                // Store the object in the session array
                $_SESSION['information'] = $information;

                // Redirect to condiments page
                $this->_f3->reroute('/information/profile/interests');
            }
        }

        $this->_f3->set('email', $_POST['email']);
        $view = new Template();
        echo $view->render('views/profile.html');
    }

    public function interests()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            var_dump($_POST);
            if (!$GLOBALS['validator']->validOutdoor($_POST['outdoor']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["outdoor"]', "Invalid out-door option");
            }
            if (!$GLOBALS['validator']->validIndoor($_POST['indoor']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["indoor"]', "Invalid in-door option");
            }
            // Data is valid
            if (empty( $this->_f3->get('errors')))
            {
                // Create an object
                $information = new Information();
                $information->setOutdoor($_POST['outdoor']);
                $information->setIndoor($_POST['indoor']);

                // Store the object in the session array
                $_SESSION['information'] = $information;

                // Redirect to condiments page
                $this->_f3->reroute('/information/profile/interests/summary');
            }
        }

        $this->_f3->set('outdoor', $_POST['outdoor']);
        $this->_f3->set('indoor', $_POST['indoor']);
        $view = new Template();
        echo $view->render('views/interests.html');
    }

}