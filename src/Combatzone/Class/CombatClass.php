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
                $this->render->message ($ChaosMarineName . " Utilise son Bolter ");                
                $SpaceMarine->attack($ChaosMarine);
                 }else if ($rand == 2) {
                $this->render->message ($ChaosMarineName . " Utilise son Epee-tranconneuse ");                                     
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
            if($SpaceMarine->state() == False || $ChaosMarine->state() == False){
                // C'est la fin du combat, on a un vainqueur;
                $this->render->success('Victoire');
                return True;
            }else if($SpaceMarine->state() == False || $ChaosMarine->state() == False) {
                // Les deux sont morts match nul
                $this->render->info('Match nul');
                echo "Match nul";
                return True;
            }
            $this->turn = $this->turn + 1;
            #code
        }
    }
}
