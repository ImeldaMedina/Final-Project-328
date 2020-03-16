<?php
/**
 * @author Imelda Medina
 * @Version 1.0
 * Class BattleShip will get the battle strength
 */
class BattleShip extends StarShip{

    private $_battleStrength;


    /**
     * @return the battle strength
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
}