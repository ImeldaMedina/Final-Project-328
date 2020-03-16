<?php
/**
 * @author Imelda Medina
 * @Version 1.0
 * Class NewUser sets the new user information like first name, last name,email, username, and password
 */
class NewUser
{
    private $_fname;
    private $_lname;
    private $_email;
    private $_username;
    private $_password;

    /**
     * NewUser constructor.
     * @param $_fname
     * @param $_lname
     * @param $_email
     * @param $_username
     * @param $_password
     */
    public function __construct($_fname, $_lname, $_email, $_username, $_password)
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_email = $_email;
        $this->_username = $_username;
        $this->_password = $_password;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed $lname represents the last name of the user
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return the email of the user
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email sets the email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return gets the user's username
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @return mixed gets the password of the user
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param represents the password of the user
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }


}