<?php
 require_once('Class/SpaceMarineClass.php');
 require_once('Class/ChaosMarine.php');
 require_once('Class/CombatClass.php');
 require_once('Class/RenderClass.php');

 
 $Vulkor = new SpaceMarine ('Vulkor', Human::MEDIUM_PV, Human::LOW_POWER);
 $Taklur = new ChaosMarine ('Taklur', Human::MEDIUM_PV, Human::LOW_POWER);
 
 $combat = new combat();
 $combat->fullcombat ($Vulkor, $Taklur);

?>

<!DOCTYPE>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Here Come a New Challenger</title>
    </head>
    <body>
        
    </body>
    </html> 

