<?php
/**
 * @author Imelda Medina
 * @Version 1.0
 * Class Member will get ans set name, last, age, gender, and phone of the user
 */
class Liner extends StarShip{

    private $_capacity;

    /**
     * @return the capacity of the spaceship
     */
    public function getCapacity()
    {
        return $this->_capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity)
    {
        $this->_capacity = $capacity;
    }
}