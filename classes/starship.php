<?php
class Starship{
    private $_name;
    private $_description;

    public function __construct($name, $description)
    {
        $this->_name = $name;
        $this->_description = $description;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    public function launch()
    {

    }
    public function hyperjump()
    {

    }
    public function land()
    {

    }

}
