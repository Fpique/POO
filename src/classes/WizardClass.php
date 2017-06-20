<?php
  require_once('HumanClass.php');
  class Wizard extends Human
  {
    private $FireBall = 5;
    private $Freeze = 10;

    public function fire($enemy)
    {
        if($this->$pm > 0 ) {
            //On envoie une boule de feu
            $enemy->receiveDamage(20);
            $this->pm = $this->pm -1;
        } else {
            //On n'envoie pas de boule de feu

        }
    }
    public function Frozen()
       {
        if($this->$Freeze > 0 ) {
            //On Gèle l'ennemi
            $this->Freeze = $this->Freeze -1;
        } else {
            //On est en pls
         }
         }
         }