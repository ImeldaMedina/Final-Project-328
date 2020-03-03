<?php
class FinalValidation
{
    private $_errors;

    public function __construct()
    {
        $this->_errors = array();
    }

    /**
     * @return array of errors
     */
    public function getErrors()
    {
        return $this->_errors;
    }


    public function validForm()
    {
        $this->validName($_POST['fname']);
        $this->validLast($_POST['lname']);
        $this->validEmail($_POST['email']);
        $this->validUsername($_POST['username']);
        $this->validPassword($_POST['password']);
        //If the $errors array is empty, then we have valid data
//        var_dump($this->_errors);
        return empty($this->_errors);
    }
    function validName($fname)
    {
        //First name is required
        if (empty($fname) || !ctype_alpha($fname)) {
            $this->_errors['fname'] = "First name is required";
        }
    }
    /**
     * checks to see that a string is all alphabetic REQUIRED
     * @param $lName last name
     */
    function validLast($lName)
    {
        //last name is required
        if (empty($lName) || !ctype_alpha($lName)) {
            $this->_errors['lName'] = "Last name is required";
        }
    }
    /**
     *  checks to see that an email address is valid
     * @param $email represnts the email
     */
    function validEmail($email)
    {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->_errors['email'] = "Please enter a valid email";
        }
    }
    /**
     *  checks to see that an email address is valid
     * @param $email represnts the email
     */
    function validUsername($username)
    {
//        Will verify if the text is is in a valid user name format like:
//        is alphanumeric, starts with an alphabet and contains no special characters
//        other than underscore or dash.
        $regex="^([a-zA-Z])[a-zA-Z_-]*[\w_-]*[\S]$|^([a-zA-Z])[0-9_-]*[\S]$|^[a-zA-Z]*[\S]$";
        if (empty($username) || !preg_match($regex, $username)) {
            $this->_errors['email'] = "Please enter a valid username \r\n Starts with an alphabet letter 
            \r\n Contains no special characters other than underscore or dash";
        }
    }
    /**
     *  Checks to see that an email address is valid.
     * The password's first character must be a letter,
    // it must contain at least 4 characters and no
    // more than 15 characters and no characters other than letters,
    // numbers and the underscore may be used.
     * @param $email represnts the email
     */
    function validPassword($password)
    {
// The password's first character must be a letter,
// it must contain at least 4 characters and no
// more than 15 characters and no characters other than letters,
// numbers and the underscore may be used
        $regexPass = "^[a-zA-Z]\w{3,14}$";
        if (empty($password) || !preg_match($regexPass, $password)) {
            $this->_errors['email'] = "Please enter a valid password \r\n
             The first character must be a letter \r\n
             It must contain at least 4 characters \r\n
              No more than 15 characters \r\n
              Numbers and the underscore may be used";
        }
    }
}
