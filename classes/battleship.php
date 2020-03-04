<?php
class BattleShip extends Starship{

    private $_battleStrength;


    /**
     * @return mixed
     */
    public function getBattleStrength()
    {
        return $this->_battleStrength;
    }

    /**
     * @param mixed $battleStrength
     */
    public function setBattleStrength($battleStrength)
    {
        $this->_battleStrength = $battleStrength;
    }



    public function fight()
    {

    }
}