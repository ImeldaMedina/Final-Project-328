<?php
class BattleShip extends Starship{
    private $_battleStrength;

    public function __construct($name, $description)
    {
        parent::__construct($name, $description);
    }

    public function fight()
    {

    }
}