<?php
require_once ('./classes/FighterClass.php');
require_once ('./classes/ThiefClass.php');
require_once ('./classes/WizardClass.php');



$Flo = new Fighter('Flo',Human::MEDIUM_PV,Human::MEDIUM_PM,Human::MEDIUM_POWER);
$Perceval = new Thief('Perceval',Human::LOW_PV,Fighter::LOW_PM,Human::LOW_POWER);
$Karadoc = new Wizard('Karadoc',Human::LOW_PV,Fighter::HIGH_PM,Human::MEDIUM_POWER);

echo($Perceval->getPv());
echo("<br>");
$Flo->slash($Perceval);
$Flo->dealDamage($Perceval);
echo($Perceval->getPv());