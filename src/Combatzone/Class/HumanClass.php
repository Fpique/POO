<?php
     require_once ('RenderClass.php');
     abstract class Human {

    const LOW_PV = 100;
    const MEDIUM_PV = 200;
    const HIGH_PV = 250;


    const LOW_POWER = 5;
    const MEDIUM_POWER = 10;
    const HIGH_POWER = 15;

    protected $pv = 900; // Accessible a la classe qui la instancié et au classe qu'elles héritent
    protected $name;   // Que dans classe ou elle a était instancié
    protected $power = 5;
    protected $render;

     public function __construct($name, $pv, $power)
    {
        $this->setpv($pv);
        $this->setpower($power);    
        $this->setname($name);
        $this->render = Render::getInstance();
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
    public function attack($ennemy)
    {
        $ennemy->receiveDamage($this->getPower());
    }
    public function receiveDamage($damage)
    {
        $this->pv = $this->getPv() - $damage;
    }
    public function state()
    {
        if($this->getPv() > 0) {
            return True;
        }else{
            return False;
        }
    }
}