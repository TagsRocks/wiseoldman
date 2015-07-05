<?php 

define('ATTACK', 1);
define('STRENGTH', 2);
define('DEFENCE', 3);
define('RANGED', 4);
define('PRAYER', 5);
define('MAGIC', 6);
define('RUNECRAFTING', 7);
define('CONSTRUCTION', 8);
define('HITPOINTS', 9);
define('AGILITY', 10);
define('HERBLORE', 11);
define('THIEVING', 12);
define('CRAFTING', 13);
define('FLETCHING', 14);
define('SLAYER', 15);
define('HUNTER', 16);
define('MINING', 17);
define('SMITHING', 18);
define('FISHING', 19);
define('COOKING', 20);
define('FIREMAKING', 21);
define('WOODCUTTING', 22);
define('FARMING', 23);
define('QUESTPOINTS', 24);
define('COMBAT', 25);

$mysqli = new mysqli('localhost', 'root', '', 'rsquest');

$mysqli->query("CREATE TABLE IF NOT EXISTS requirements (
	id int(12) NOT NULL AUTO_INCREMENT, 
	skill_id int(12) NOT NULL DEFAULT 0, 
	skill_level int(12) NOT NULL DEFAULT 0, 
	explanation varchar(255) NOT NULL DEFAULT '', 
	primary key(id));
");

$mysqli->query("CREATE TABLE IF NOT EXISTS quests_to_requirements (
	quest_id int(12),
	skill_id int(12),
	primary key(quest_id, skill_id)
	)");

$requirements = [

	//animal magnetism
	[
		[1, SLAYER, 18, 'Required to chop down undead trees.'],
		[2, CRAFTING, 19, 'Required to attach avas device together.'],
		[3, RANGED, 30, 'Required to start animal magnetism.'],
		[4, WOODCUTTING, 35, 'Required to chop down undead tree']
	],

	//another slice of ham
	[
		[5, ATTACK, 15],
		[6, PRAYER, 25]
	],

	//between a rock
	[
		[7, DEFENCE, 30],
		[8, MINING, 40],
		[9, SMITHING, 50]
	],

	//big chompy
	[
		[10, FLETCHING, 5],
		[11, COOKING, 30],
		[12, RANGED, 30]
	],

];

foreach($requirements as $key=>$quest) {
	foreach($quest as $order=>$quest_requirement) {

		$id = $quest_requirement[0];
		$s_id = $quest_requirement[1];
		$s_level = $quest_requirement[2];
		if(isset($quest_requirement[3])) {
			$explanation = $quest_requirement[3];
		} else {
			$explanation = '';
		}
		
		$mysqli->query(
			"INSERT INTO quests_to_requirements VALUES($key+1, $id)"
		);
		$mysqli->query("INSERT INTO requirements(`id`, `skill_id`, `skill_level`, `explanation`) VALUES($id, $s_id, $s_level,
		'$explanation')");
	}
}
