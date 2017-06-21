<?php
require_once('RenderClass.php');
class Combat
{
    private $turn = 0;
    private $render;

    public function __construct(){
        $this->render = Render::getInstance();
    }

    public function initiative()
    {
        $rand1 = rand(1, 1000);
        $rand2 = rand(1, 1000);
        if($rand1 > $rand2) {
            // Joueur 1 joue en premier
            return 1;
        }else if ($rand2 > $rand1) {
            // Joueur 2 joue en premier
            return 2;
        }else{
            Return False;
            // Si rand1 = rand 2 alors à gérer
        }
    }
    // Simule un tour de combat
    public function combatTurn($SpaceMarine, $ChaosMarine) 
    {    
        $ChaosMarineName = $ChaosMarine->getName();
        $SpaceMarineName = $SpaceMarine->getName();
        $initiative = $this->initiative();
        switch ($initiative) {
            case 1:     
            $this->render->message($SpaceMarine->getName() . " attaque " . $ChaosMarine->getName());        
            $rand = rand(1, 2);
            if($rand == 1) {
                $this->render->message ($SpaceMarineName . " Utilise son Bolter ");                
                $SpaceMarine->attack($ChaosMarine);
                 }else if ($rand == 2) {
                $this->render->message ($SpaceMarineName . " Utilise son Epee-tranconneuse ");                                     
                $SpaceMarine->slash($ChaosMarine);
                 }                
            break;
            // Le joueur 2 attaque
            case 2:      
            $this->render->message($ChaosMarine->getName() . " attaque " . $SpaceMarine->getName());                    
            $rand = rand(1, 2);
            if($rand == 1) {
                $this->render->message ($ChaosMarineName . " Utilise son Bolter à energie ");
                $ChaosMarine->attack($SpaceMarine);
                 }else if ($rand == 2) {
                $this->render->message ($ChaosMarineName . " Utilise son Lance-Flamme ");                     
                $ChaosMarine->burn($SpaceMarine);
                 }  
            break;
            // On ne fait rien, et on lance un nouveau tour
            case False:
            break;
            default:
            Throw new Exception("Erreur lors de l'initiative : " . $initiative);
            break;
        }
    }
    public function fullcombat($SpaceMarine, $ChaosMarine) 
    {
        while (True) {
            $this->combatTurn($SpaceMarine, $ChaosMarine);  
            if($SpaceMarine->state() == False && $ChaosMarine->state() == True){
            // le marine du chaos à gagné
            $this->render->success('Le chaos a vaincu');
                return True;
            }else if($ChaosMarine->state() == False && $SpaceMarine->state() == True) { 
            // le SpaceMarine à gagné 
            $this->render->success('La loi a vaincu'); 
                return True;                        
            }else if($SpaceMarine->state() == False && $ChaosMarine->state() == False) {                             
            // Match nul les deux sont morts
            $this->render->info('Match Nul'); 
                return True;   
            }else if($SpaceMarine->state() == True && $ChaosMarine->state() == True){ 
            // Les deux sont vivants on continue
            $this->turn = $this->turn + 1;
             }
        }
    }
}
