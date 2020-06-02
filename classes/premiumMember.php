<?php

class PremiumMember extends member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    function __construct($fName = "Alex", $lName = "John", $age = 21, $gender = "male", $phone = "123-123-1234",
                         $email = "vvadim@gmail.com", $state = "Washington",
                         $seeking = "female", $bio = "I like food",
                         $inDoorInterests = "Reading", $outDoorInterests = "Hiking")
    {
        parent::__construct($fName, $lName, $age, $gender, $phone, $email, $state, $seeking, $bio);
        $this->setinDoorInterests($inDoorInterests);
        $this->setoutDoorInterests($outDoorInterests);
    }

    /**
     * @return mixed
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param mixed $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param mixed $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}
