<?php

// Validate.php
/* Return a value indicating if name parameter is valid
 * Valid names are not empty and do not contain anything except letters
 * @param String $first
 * @return boolean
 */
class Validate
{

    function validName($name)
    {
        $name = str_replace(' ', '', $name);
        return !empty($name) && ctype_alpha($name);
    }

    /* Return a value indicating if age parameter is valid
     * Valid names are between 18 and 118
     * @param int age
     * @return boolean
     */
    function validAge($age)
    {
        if ($age >= 18 && $age <= 118) {
            return true;
        } else {
            return false;
        }
    }

    /* Return a value indicating if email parameter is valid
     * Valid phone is 123-123-1234
     * @param int phone
     * @return boolean
     */
    function validPhone($phone)
    {
        if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
            return true;
        } else {
            return false;
        }
    }

    /* Return a value indicating if email parameter is valid
     * Valid phone is example@example.com
     * @param string email
     * @return boolean
     */
    function validEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    /* Return a value indicating if outdoor parameter is valid
     * Valid outdoor activity is inside an array
     * @param outdoor
     * @return boolean
     */
    function validOutdoor($outdoor)
    {
        if (isset($outdoor)) {
            foreach ($outdoor as $outdoors) {
                if (!in_array($outdoors, getOutdoor())) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    /* Return a value indicating if indoor parameter is valid
     * Valid indoor activity is inside an array
     * @param indoor
     * @return boolean
     */
    function validIndoor($indoor)
    {
        if (isset($indoor)) {
            foreach ($indoor as $indoors) {
                if (!in_array($indoors, getIndoor())) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}
