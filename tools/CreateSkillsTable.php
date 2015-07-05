<?php

require "../Entities/Connection.php";

$connection = new Connection();

$skill_names = [
'Attack',
'Strength',
'Defence',
'Ranged',
'Prayer',
'Magic',
'Runecrafting',
'Construction',
'Hitpoints',
'Agility',
'Herblore',
'Thieving',
'Crafting',
'Fletching',
'Slayer',
'Hunter',
'Mining',
'Smithing',
'Fishing',
'Cooking',
'Firemaking',
'Woodcutting',
'Farming',
'QP',
'Combat'
];

foreach($skill_names as $key=>$skill) {
      $connection->get_connection()->query("insert into `skills` VALUES($key+1, '$skill')");
}
?>