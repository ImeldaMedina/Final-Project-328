<?php
class Yacht extends StarShip{

    private $_starRating;

    /**
     * @return mixed
     */
    public function getStarRating()
    {
        return $this->_starRating;
    }

    /**
     * @param mixed $starRating
     */
    public function setStarRating($starRating)
    {
        $this->_starRating = $starRating;
    }

    public function banquet()
    {

    }
}