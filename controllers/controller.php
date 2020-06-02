<?php

class Controller
{
    private $_f3; //router
    private $_validator; //validation object

    /**
     * Controller constructor.
     * @param $f3
     * @param $validator
     */
    public function __construct($f3, $validator)
    {
        $this->_f3 = $f3;
        $this->_validator = $validator;
    }

    /**
     * Display the default route
     */
    public function home()
    {
        //echo '<h1>Welcome to my Dating Website!</h1>';

        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     * Display the information route
     */
    public function information()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //var_dump($_POST);
            // Validate first and last name
            if (!$this->_validator->validName($_POST['fName']))
            {
                //Set an error variable in the F3 hive
                $this->_f3->set('errors["fName"]', "Invalid first name");
            }
            if (!$this->_validator->validName($_POST['lName']))
            {
                //Set an error variable in the F3 hive
                $this->_f3->set('errors["lName"]', "Invalid last name");
            }
            if (!$this->_validator->validAge($_POST['age']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["age"]', "Invalid age, 18-118");
            }
            if (!$this->_validator->validPhone($_POST['phone']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["phone"]', "Invalid phone number (111-222-333)");
            }
            // Data is valid
            if (empty($this->_f3->get('errors')))
            {
                //Store the data in the session array
                $_SESSION['fName'] = $_POST['fName'];
                $_SESSION['lName'] = $_POST['lName'];
                $_SESSION['age'] = $_POST['age'];
                $_SESSION['gender'] = $_POST['gender'];
                $_SESSION['phone'] = $_POST['phone'];

                $this->_f3->reroute('/information/profile');
            }
        }
        $this->_f3->set('fName', $_POST['fName']);
        $this->_f3->set('lName', $_POST['lName']);
        $this->_f3->set('age', $_POST['age']);
        $this->_f3->set('genders', getGender());
        $this->_f3->set('sGender', $_POST['gender']);
        $this->_f3->set('phone', $_POST['phone']);

        $view = new Template();
        echo $view->render('views/information.html');
    }

    /**
     * Display the profile route
     */
    public function profile()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (!$this->_validator->validEmail($_POST['email']))
            {
                // Set an error variable in the F3 hive
                $this->_f3->set('errors["email"]', "Invalid email");
            }
            // Data is valid
            if (empty($this->_f3->get('errors')))
            {
                $_SESSION['state'] = $_POST['state'];
                $_SESSION['seeking'] = $_POST['seeking'];
                $_SESSION['bio'] = $_POST['bio'];
                $_SESSION['email'] = $_POST['email'];

                $this->_f3->reroute('/information/profile/interests');
            }
        }

        $this->_f3->set('email', $_POST['email']);
        $this->_f3->set('sexes', getSeek());
        $this->_f3->set('sSex', $_POST['sex']);
        $view = new Template();
        echo $view->render('views/profile.html');
    }

    /**
     * Display the interests route
     */
    public function interests()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (!$this->_validator->validOutdoor($_POST['outdoor'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["outdoor"]', "Invalid");
            }
            if (!$this->_validator->validIndoor($_POST['indoor'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["indoor"]', "Invalid");
            }

            if (empty($this->_f3->get('errors')))
            {
                // store the data in the session array
                $_SESSION['outdoor'] = $_POST['outdoor'];
                $_SESSION['indoor'] = $_POST['indoor'];

                $this->_f3->reroute('summary');
                session_destroy();
            }
        }
        $this->_f3->set('outdoor', getOutdoor());
        $this->_f3->set('outdoors', $_POST['outdoor']);
        $this->_f3->set('indoor', getIndoor());
        $this->_f3->set('indoors', $_POST['indoor']);

        $view = new Template();
        echo $view->render('views/interests.html');
    }

    /**
     * Display the summary route
     */
    public function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}