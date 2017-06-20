<?php 
require_once('HumanClass.php');
    class SpaceMarine extends Human                     // On créer une classe SpaceMarine qui hérite de la classe Human
        {
            private $fuel = 10;                         // On défini 2 propriété sur la class Private pour les modif on passe par setter ou getter
            private $ammo = 30;
            private $armor = 10;

            public function attack($enemy)              // On créer méthode attack (déja présente sur méthode Human), argument enemy pour choisir l'enemy qu'on attaque
            {
                $ammoCount = 0;
                if($this->ammo > 0) {                    // On vérifie si propriété ammo > 0
                  if($this->ammo < 10) {                // Si moins de 10 balles
                    $ammoCount = rand(1, $this->ammo);   // 
                  } else {                              // Sinon
                  $ammoCount = rand(1, 10);             //
                  }                  
                  $enemy->receiveDamage($this->getPower() + $ammoCount);  
                  $this->ammo = $this->ammo - $ammoCount;                   // Pour limiter nombre de balles
                } else if ($this->ammo == 0) {
                  $this->ammo = 30;                       //Si munition = 0 on passe les munition à 30
                } else {
                  throw new Exception ('Erreur de chargeur, quantité de balle : ' . $this->ammo);  // Message d'erreur si on est à - de 0 balle si bug dans le code
                }
            }   
            public function slash($enemy)
            {
                if($this->fuel > 0) {
                    $enemy->receiveDamage($this->getPower() + rand(0, 5));
                    $this->fuel - 1;
                } else if ($this->fuel == 0) {
                    // On ne peut pas attaquer au corps à corps
                } else {
                  throw new Exception ('Erreur de fuel, quantité de fuel : ' . $this->fuel);  // Message d'erreur si on est à - de 0 fuel si bug dans le code                   
                }
            }   
            public function receiveDamage($damage)      
            {
                if(($damage - $this->armor) <= 0) {
                    // Aucun dégat n'est fait
                } else {
                $this->pv = $this->getPv() - ($damage - $this->armor);    
                }              
            }
        }
        
        