<?php 
require_once('HumanClass.php');
class Thief extends Human  
{
    private $cloak = 5;
    private $agility = 10;

    public function hide()
    {
        if($this->$cloak > 0) {
            //Il evite le coup
            $this->cloak = $this->cloak -1;
        } else {
            //Il n'évite pas le coup
        }
    }
    public function stab($enemy)
    {
        if($this->$agility > 0) {
            //Il poignarde l'adversaire
            $enemy->receiveDamage(15);
            $this->agility = $this->agility -1;
            
    } else {
            //Il échoue
    }
}
}