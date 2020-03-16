<?php
/**
 * @author Imelda Medina
 * @Version 1.0
 * Class Yacht sets the spaceship rating
 */
class Yacht extends StarShip{

    private $_starRating;

    /**
     * @return mixed returns the spaceship rating
     */
    public function getStarRating()
    {
        return $this->_starRating;
    }

    /**
     * @param mixed $starRating represents the rating of the spaceship
     */
    public function setStarRating($starRating)
    {
        $this->_starRating = $starRating;
    }

}