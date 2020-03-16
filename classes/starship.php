<?php
/**
 * @author Imelda Medina
 * @Version 1.0
 * Class Starship  sets name, generator, engine, hyperdrive, shield, power, price, description and color.
 */
class StarShip{
    private $_name;
    private $_generator;
    private $_engine;
    private $_hyperdrive;
    private $_shield;
    private $_power;
    private $_price;
    private $_description;
    private $_color;

    public function __construct($name, $generator, $engine, $hyperdrive, $shield, $color, $power, $price)

    {
        $this->_name = $name;
        $this->_generator = $generator;
        $this->_engine = $engine;
        $this->_hyperdrive = $hyperdrive;
        $this->_shield = $shield;
        $this->_color = $color;
        $this->_power = $power;
        $this->_price = $price;

    }

    /**
     * @return the name of the user
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param represents the name of the user
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return mixed gets the description of the spaceship
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description represents a description of the spaceship
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return gets the type of generator of the spaceship
     */
    public function getGenerator()
    {
        return $this->_generator;
    }

    /**
     * @param represents the spaceship generator
     */
    public function setGenerator($generator)
    {
        $this->_generator = $generator;
    }

    /**
     * @return mixed get the type of engine
     */
    public function getEngine()
    {
        return $this->_engine;
    }

    /**
     * @param mixed $engine represents the type of engine
     */
    public function setEngine($engine)
    {
        $this->_engine = $engine;
    }

    /**
     * @return mixed gets the Hhperdrive type
     */
    public function getHyperdrive()
    {
        return $this->_hyperdrive;
    }

    /**
     * @param mixed $hyperdrive represents the hyperdrive
     */
    public function setHyperdrive($hyperdrive)
    {
        $this->_hyperdrive = $hyperdrive;
    }

    /**
     * @return mixed gets the shield of the spaceship
     */
    public function getShield()
    {
        return $this->_shield;
    }

    /**
     * @param mixed $shield represents the type of shield
     */
    public function setShield($shield)
    {
        $this->_shield = $shield;
    }

    /**
     * @return mixed gets the color of the spaceship
     */
    public function getColor()
    {
        return $this->_color;
    }

    /**
     * @return represents the power of the spaceship
     */
    public function getPower()
    {
        return $this->_power;
    }

    /**
     * @param mixed $power represents the power of the spaceship
     */
    public function setPower($power)
    {
        $this->_power = $power;
    }

    /**
     * @return mixed returns the price of the spaceship
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param mixed $price represents the spaceship price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
    }


    /**
     * @param mixed $color represente the color of the spaceship
     */
    public function setColor($color)
    {
        $this->_color = $color;
    }

}
