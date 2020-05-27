<?php

class Information
{
    // Declare instance variables
    private $_first;
    private $_last;
    private $_age;
    private $_phone;
    private $_email;
    private $_outdoor;
    private $_indoor;

    /** Default constructor
     * @param string $first the first name
     * @param string $last the last name
     * @param string $age the age
     * @param string $phone the phone
     * @param string $email
     * @param array $outdoor
     * @param array $indoor
     */
    public function __construct($first = "James", $last = "Bond", $age = "20", $phone = "425-625-2524",
                                $email = "james@bond.com", $outdoor = array("Hiking", "Walking"),
                                $indoor = array("Swimming", "Collecting"))
    {
        $this->setFirst($first);
        $this->setLast($last);
        $this->setAge($age);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setOutdoor($outdoor);
        $this->setIndoor($indoor);
    }

    /** Set the first name
     * @param $first the first name
     */
    public function setFirst($first)
    {
        $this->_first = $first;
    }

    /**
     * @return string|the first name
     */
    public function getFirst()
    {
        return $this->_first;
    }

    /**
     * @param string|the $last
     */
    public function setLast($last)
    {
        $this->_last = $last;
    }

    /**
     * @return last name
     */
    public function getLast()
    {
        return $this->_last;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /** Set the phone number
     * @param $phone the phone number
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return int|the phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /** Set the email
     * @param $email the email address
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return string|the email address
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @return mixed
     */
    public function getOutdoor()
    {
        return $this->_outdoor;
    }

    /**
     * @param mixed $outdoor
     */
    public function setOutdoor($outdoor)
    {
        $this->_outdoor = $outdoor;
    }

    /**
     * @return mixed
     */
    public function getIndoor()
    {
        return $this->_indoor;
    }

    /**
     * @param mixed $indoor
     */
    public function setIndoor($indoor)
    {
        $this->_indoor = $indoor;
    }


}

