<?php
     abstract class Human {

    const LOW_PV = 100;
    const MEDIUM_PV = 150;
    const HIGH_PV = 200;

    const LOW_PM = 15;
    const MEDIUM_PM = 30;
    const HIGH_PM = 45;

    const LOW_POWER = 5;
    const MEDIUM_POWER = 10;
    const HIGH_POWER = 15;

    private $pv = 900;
    public $pm = 10;
    private $name;
    public $power = 5;

     public function __construct($name, $pv, $pm, $power)
    {
        $this->setpv($pv);
        $this->setpm($pm);
        $this->setpower($power);    
        $this->setname($name);
    }
    public function setPv($pv)
    {
        if($pv === Self::LOW_PV || $pv === Self::MEDIUM_PV || $pv === Self::HIGH_PV) {
            $this->pv = $pv; 
        } else {
        throw new exception ('Erreur de valeur pour les points de vies'); 
        }
    }
    public function getPv()
    {
        return $this->pv;
    }
    public function setPm($pm)
    {
        if($pm === Self::LOW_PM || $pm === Self::MEDIUM_PM || $pm === Self::HIGH_PM) {
            $this->pm = $pm; 
        } else {
        throw new exception ('Erreur de valeur pour les points de mana'); 
        }
    }
    public function getPm()
    {
        return $this->pm;
    }
    private function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setPower($power)
    {
        if($power === Self::LOW_POWER || $power  === Self::MEDIUM_POWER || $power === Self::HIGH_POWER) {
            $this->power = $power; 
        } else {
        throw new exception ('Erreur de valeur pour les points de mana'); 
        }
    }
    public function getPower()
    {
        return $this->power;
    }
    public function dealdamage($ennemy)
    {
        $ennemy->receiveDamage($this->getPower() * 5);
    }
    public function receiveDamage($damage)
    {
        $this->pv = $this->getPv() - $damage;
    }
};