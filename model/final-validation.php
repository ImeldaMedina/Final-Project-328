<?php
class FinalValidation
{
    private $_f3;
    private $_db;


    public function __construct($f3, $db)
    {
        $this->_f3 = $f3;
        $this->_db = $db;
    }



    public function validForm()
    {
        $isValid = true;

        $isValid += $this->validName($_POST['fname']);
        $isValid += $this->validLast($_POST['lname']);
        $isValid += $this->validEmail($_POST['email']);
        $isValid += $this->validUsername($_POST['username']);
        $isValid += $this->validPassword($_POST['password']);
        $isValid += $this->validRepPassword($_POST['password'], $_POST['rep-password']);
        //If the $errors array is empty, then we have valid data
//        var_dump($this->_errors);
        return $isValid;
    }
    function validName($fname)
    {
        //First name is required
        if (empty($fname) || !ctype_alpha($fname)) {
            $this->_f3->set("errors['fname']", "Invalid First Name");
            return false;
        }
        return true;
    }

    /**
     * checks to see that a string is all alphabetic REQUIRED
     * @param $lName ; last name
     * @return bool if last name passed
     */
    function validLast($lName)
    {
        //last name is required
        if (empty($lName) || !ctype_alpha($lName)) {
            $this->_f3->set("errors['lname']", "Invalid Last Name");
            return false;
        }
        return true;
    }

    /**
     *  checks to see that an email address is valid
     * @param $email ; represents the email
     * @return bool if email passed
     */
    function validEmail($email)
    {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->_f3->set("errors['email']", "Invalid Email");
            return false;
        }
        return true;
    }

    /**
     *  checks to see that an email address is valid
     * @param $username ; represents the username to be validated
     * @return bool if username passed
     */
    function validUsername($username)
    {
//        Will verify if the text is is in a valid user name format like:
//        is alphanumeric, starts with an alphabet and contains no special characters
//        other than underscore or dash.
        $regex="/^([a-zA-Z])[a-zA-Z_-]*[\w_-]*[\S]$|^([a-zA-Z])[0-9_-]*[\S]$|^[a-zA-Z]*[\S]$/";
        if (empty($username) || !preg_match($regex, $username)) {
            $this->_f3->set("errors['username']", "\"Please enter a valid username, \r\n it must start with letter and
            contain no special characters other than underscore or dash\"");
            return false;
        }
        return true;
    }

    /**
     *  Checks to see that an email address is valid.
     * The password's first character must be a letter,
     * // it must contain at least 4 characters and no
     * // more than 15 characters and no characters other than letters,
     * // numbers and the underscore may be used.
     * @param $password ; The password to be validated
     * @return bool if password passed
     */
    function validPassword($password)
    {
// The password's first character must be a letter,
// it must contain at least 4 characters and no
// more than 15 characters and no characters other than letters,
// numbers and the underscore may be used
        $regexPass = "/^[a-zA-Z]\w{3,14}$/";
        if (empty($password) || !preg_match($regexPass, $password)) {

            $this->_f3->set("errors['password']", "Please enter a valid password.
             The first character must be a letter, it must contain 4-15 characters.
              Numbers and the underscore may be used");

            return false;

        }
        return true;
    }

    /**
     *  Checks to see that the second password matches the first
     * @param $password ; The original password
     * @param $repPassword ; the other password (should be the same)
     * @return bool if password and repPassword are the same
     */
    function validRepPassword($password, $repPassword)
    {
        if ($password != $repPassword) {

            $this->_f3->set("errors['misMatched']", "Passwords do not match");
            return false;

        }
        return true;
    }



}
