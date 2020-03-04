<?php
class StarShip{
    private $_name;
    private $_generator;
    private $_engine;
    private $_hyperdrive;
    private $_shield;

    private $_description;
    private $_color;

    public function __construct($name, $generator, $engine, $hyperdrive, $shield, $color)

    {
        $this->_name = $name;
        $this->_generator = $generator;
        $this->_engine = $engine;
        $this->_hyperdrive = $hyperdrive;
        $this->_shield = $shield;
        $this->_color = $color;

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
    public function getLast()
    {
        return $this->_last;
    }

    /**
     * @param mixed $last
     */
    public function setLast($last)
    {
        $this->_last = $last;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
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

    /**
     * @return mixed
     */
    public function getGenerator()
    {
        return $this->_generator;
    }

    /**
     * @param mixed $generator
     */
    public function setGenerator($generator)
    {
        $this->_generator = $generator;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->_engine;
    }

    /**
     * @param mixed $engine
     */
    public function setEngine($engine)
    {
        $this->_engine = $engine;
    }

    /**
     * @return mixed
     */
    public function getHyperdrive()
    {
        return $this->_hyperdrive;
    }

    /**
     * @param mixed $hyperdrive
     */
    public function setHyperdrive($hyperdrive)
    {
        $this->_hyperdrive = $hyperdrive;
    }

    /**
     * @return mixed
     */
    public function getShield()
    {
        return $this->_shield;
    }

    /**
     * @param mixed $shield
     */
    public function setShield($shield)
    {
        $this->_shield = $shield;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->_color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->_color = $color;
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
