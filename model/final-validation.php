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
        $this->validemail($_POST['lname']);
        $this->validAge($_POST['age']);
        $this->validPhone($_POST['phoneNum']);
    }
}
