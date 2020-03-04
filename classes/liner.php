<?php
class Liner extends StarShip{

    private $_capacity;

    /**
     * @return mixed
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

    public function enteratain()
    {

    }
}