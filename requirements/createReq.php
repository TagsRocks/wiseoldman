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

$mysqli = new mysqli('localhost', 'root', '123', 'rsquest');

$mysqli->query("CREATE TABLE IF NOT EXISTS requirements (
	id int(12) NOT NULL AUTO_INCREMENT, 
	skill_id int(12) NOT NULL DEFAULT 0, 
	skill_level int(12) NOT NULL DEFAULT 0, 
	explanation varchar(255) NOT NULL DEFAULT '', 
	primary key(id));
");

$mysqli->query("CREATE TABLE IF NOT EXISTS quests_to_requirements (
	quest_id int(12),
	requirements_id int(12),
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
	//biohazard
	[

	],
	//black knights fortress
	[
		[13, QUESTPOINTS, 12]
	],
	//cabin fever
	[
		[14, AGILITY, 42],
		[15, CRAFTING, 45],
		[16, SMITHING, 50],
		[17, RANGED, 40]
	],
	//clock tower
	[

	],
	//cold war
	[
		[18, HUNTER, 10],
		[19, AGILITY, 30],
		[20, CRAFTING, 30],
		[21, CONSTRUCTION, 34]
	],
	//contact
	[

	],
	//cooks assistant
	[

	],
	//creature of frankenstrain
	[
		[22, CRAFTING, 20],
		[23, THIEVING, 25]
	],
	//darkness of hallowvale
	[
		[24, CONSTRUCTION, 5],
		[25, MINING, 20],
		[26, THIEVING, 22],
		[27, CRAFTING, 32],
		[28, MAGIC, 33],
		[29, STRENGTH, 40]
	],
	//death plateau
	[
		//i leave this empty as no reqs for 
		//death plateu
	],
	//death to dorg
	[
		[30, AGILITY, 23],
		[31, THIEVING, 23]
	],
	//Demon Slayer
	[
	
	],
	//Desert Treasure
	[
		[32, SLAYER, 10],
		[33, FIREMAKING, 50],
		[34, MAGIC, 50],
		[35, THIEVING, 53]
	],
	//Devious Minds
	[
		[36, SMITHING, 65],
		[37, FLETCHING, 50],
		[38, RUNECRAFTING, 50]
	],
	//Digsite, The
	[
		[39, THIEVING, 25],
		[40, AGILITY, 10],
		[41, HERBLORE, 10]
	],
	//Doric's Quest
	[
		[42, MINING, 15]
	],
	//Dragon Slayer
	[
	
	],
	//Dream Mentor
	[
		[43, COMBAT, 85]
	],
	//Druidic Ritual
	[
	
	],
	//Dwarf Cannon
	[
	
	],
	//Eadgar's Ruse
	[
		[44, HERBLORE, 31],
		[45, AGILITY, 47]	
	],
	//Eagles' Peak
	[
		[46, HUNTER, 27]	
	],
	//Elemental Workshop I, The
	[
		[47, MINING, 20],
		[48, SMITHING, 20],
		[49, CRAFTING, 20]
	],
	//Elemental Workshop II, The
	[
		[50, MAGIC, 20],
		[51, SMITHING, 30]
	],
	//Enakhra's Lament 
	[
		[52, MINING, 45],
		[53, CRAFTING, 50],
		[54, FIREMAKING, 45],
		[55, PRAYER, 43],
		[56, MAGIC, 39]
	],
	//Enlightened Journey
	[
	
	],
	//Ernest the Chicken
	[
	
	],
	//Eyes of Glouphrie, The
	[
		[57, CONSTRUCTION, 5],
		[58, MAGIC, 46],
		[59, RUNECRAFTING, 13],
		[60, WOODCUTTING, 45]
	],
	//Fairytale I - Growing Pains
	[
	],
	//Fairytale II - Cure a Queen
	[
		[61, HERBLORE, 57],
		[62, FARMING, 49],
		[63, THIEVING, 40]
	],
	//Family Crest
	[
		[64, MINING, 40],
		[65, SMITHING, 40],
		[66, CRAFTING, 40],
		[67, MAGIC, 59]
	],
	//Feud, The
	[
		[68, THIEVING, 30]
	],
	//Fight Arena
	[

	],
	//Fishing Contest
	[
		[69, FISHING, 10]
	],	
	//Forgettable Tale of a Drunken Dwarf
	[
		[70, FARMING, 17],
		[71, COOKING, 22]
	],
	//Fremennik Isles, The
	[
		[72, CONSTRUCTION, 20],
		[73, AGILITY, 40],
		[74, CRAFTING, 46],
		[75, WOODCUTTING, 56]
	],
	//Fremennik Trials, The
	[
		[76, WOODCUTTING, 40],
		[77, CRAFTING, 40],
		[78, FLETCHING, 25]
	],
	//Garden of Tranquillity
	[
		[79, FARMING, 25],
	],	
	//Gertrude's Cat
	[
	],	
	//Ghosts Ahoy
	[		
		[80, COOKING, 20],
		[81, AGILITY, 25]
	],
	//Giant Dwarf, The
	[		
		[82, MAGIC, 33],
		[83, FIREMAKING, 16],
		[84, THIEVING, 14],
		[85, CRAFTING, 12],
		[86, MINING, 20],
		[87, SMITHING, 20]
	],
	//Goblin Diplomacy
	[
	],
	//Golem, The
	[
		[88, CRAFTING, 20],
		[89, THIEVING, 25]
	],
	//Grand Tree, The
	[
		[90, AGILITY, 25]
	],
	//Great Brain Robbery, The
	[
		[91, CRAFTING, 16],
		[92, CONSTRUCTION, 30],
		[93, PRAYER, 50]
	],
	//Grim Tales
	[
		[94, FARMING, 45],
		[95, HERBLORE, 52],
		[96, THIEVING, 58],
		[97, AGILITY, 59],
		[98, WOODCUTTING, 71]	
	],
	//Hand in the Sand, The
	[
		[99, CRAFTING, 49],
		[100, THIEVING, 17]
	],	
	//Haunted Mine
	[
		[101, CRAFTING, 35],
		[102, AGILITY, 15]
	],
	//Hazeel Cult
	[
	
	],	
	//Heroes' Quest
	[
		[103, QUESTPOINTS, 55],
		[104, HERBLORE, 25],
		[105, MINING, 50],
		[106, FISHING, 53],
		[107, COOKING, 53],
		[108, PRAYER, 43]
	
	],
	//Holy Grail
	[
		[109, ATTACK, 30],
	],	
	//Horror From The Deep
	[
		[110, AGILITY, 35],
		[111, MAGIC, 13]
	],	
	//Icthlarin's Little Helper
	[

	],	
	//Imp Catcher
	[

	],
	
	//In Aid of the Myreque
	[
		[112, MINING, 15],
		[113, CRAFTING, 25],
		[114, MAGIC, 7]
	],	
	//In Search of the Myreque
	[
		[115, AGILITY, 25]
	],	
	//Jungle Potion
	[
		[116, HERBLORE, 3]
	],	
	//King's Ransom
	[
		[117, MAGIC, 45],
		[118, DEFENCE, 65]
	],	
	//Knight's Sword, The
	[
		[119, MINING, 10]
	],	
	//Legends' Quest
	[
		[120, MAGIC, 56],
		[121, MINING, 52],
		[122, AGILITY, 50],
		[123, CRAFTING, 50],
		[124, SMITHING, 50],
		[125, STRENGTH, 50],
		[126, THIEVING, 50],
		[127, WOODCUTTING, 50],
		[128, HERBLORE, 45],
		[129, PRAYER, 42]
	],
	//Lost City
	[
		[130, CRAFTING, 31],
		[131, WOODCUTTING, 36]
	],	
	//Lost Tribe, The
	[
		[221, MINING, 17],
		[222, AGILITY, 13],
		[223, THIEVING, 13]
	],	
		
	//Lunar Diplomacy
	[
		[132, CRAFTING, 61],
		[133, DEFENCE, 40],
		[134, FIREMAKING, 49],
		[135, HERBLORE, 5],
		[136, MAGIC, 65],
		[137, MINING, 60],
		[138, WOODCUTTING, 55]
	],	
	//Making History
	[
		[139, CRAFTING, 20],
		[140, SMITHING, 40],
		[141, MAGIC, 7]
	],
	//Merlin's Crystal
	[
		[142, ATTACK, 20]
	],
	//Monk's Friend
	[
	
	],
	//Monkey Madness
	[
		[143, PRAYER, 43]
	],
	
	//Mountain Daughter
	[
		[144, AGILITY, 20]
	],
	
	
	//Mourning's Ends Part I
	[
		[145, RANGED, 60],
		[146, THIEVING, 50]
	],
	//Mourning's Ends Part II (The Temple Of Light)	
	[
		[147, AGILITY, 65]
	],
	//Murder Mystery
	[

	],
	//My Arm's Big Adventure
	[
		[148, WOODCUTTING, 10],
		[149, FARMING, 29],
		[150, MAGIC, 61]
	],
	//Nature Spirit
	[
		[151, CRAFTING, 18]
	],
	//Observatory Quest
	[
		[152, CRAFTING, 10]
	],
	//Olaf's Quest
	[
		[153, FIREMAKING, 40],
		[154, WOODCUTTING, 50]
	],
	//One Small Favour
	[
		[155, CRAFTING, 25],
		[156, HERBLORE, 18],
		[157, AGILITY, 36],
		[158, SMITHING, 30]
	],
	//Pirate's Treasure
	[
	],
	//Plague City
	[
	],
	//Priest in Peril
	[
	],
	//Prince Ali Rescue
	[
	],
	//Rag and Bone Man
	[
	],
	//Rat Catchers
	[
	],
	//Recipe for Disaster
	[
		[159, COOKING, 70],
		[160, FIREMAKING, 20],
		[161, AGILITY, 48],
		[162, QUESTPOINTS, 175]
	],
	//Recruitment Drive
	[
		[163, QUESTPOINTS, 12]
	],
	//Regicide
	[
		[164, AGILITY, 56],
		[165, CRAFTING, 10]
	],
	//Romeo and Juliet
	[

	],
	
	//Roving Elves
	[

	],
	//Royal Trouble
	[
		[166, AGILITY, 40],
		[167, SLAYER, 40]
	],
	//Rum Deal
	[
		[168, FARMING, 40],
		[169, FISHING, 50],
		[170, PRAYER, 47],
		[171, CRAFTING, 42],
		[172, SLAYER, 42]
	],
	//Rune Mysteries
	[
	],
	//Scorpion Catcher
	[
		[173, PRAYER, 31]
	],
	
	//Sea Slug
	[
		[174, FIREMAKING, 30]
	],
	//Shades Of Mort'ton
	[
		[175, HERBLORE, 15],
		[176, CRAFTING, 20]
	],
	//Shadow of the Storm
	[
		[177, CRAFTING, 30]
	],
	//Sheep Herder
	[
	],
	//Sheep Shearer
	[
	],
	//Shield of Arrav
	[
	],
	//Shilo Village
	[
		[178, AGILITY, 32],
		[179, CRAFTING, 20]
	],
	//Slug Menace
	[
		[180, CRAFTING, 30],
		[181, RUNECRAFTING, 30],		
		[182, SLAYER, 30],
		[183, THIEVING, 30]
	],
	//Soul's Bane, A
	[

	],
	//Spirits of the Elid
	[
		[184, MAGIC, 33],
		[185, RANGED, 37],		
		[186, MINING, 37],
		[187, THIEVING, 37]
	],
	
	//Swan Song
	[
		[184, MAGIC, 66],
		[185, COOKING, 62],		
		[186, FISHING, 62],
		[187, SMITHING, 45],
		[185, FIREMAKING, 42],		
		[186, CRAFTING, 40],
		[187, RUNECRAFTING, 23]
	],
	//Tai Bwo Wannai Trio
	[
		[188, COOKING, 30],
		[189, AGILITY, 15],		
		[190, FISHING, 5]
	],
	//Tail of Two Cats, A
	[

	],
	//Tears of Guthix
	[
		[191, FIREMAKING, 49],
		[192, CRAFTING, 20],		
		[193, MINING, 20],
		[194, QUESTPOINTS, 44],
		[195, CRAFTING, 49],		
		[196, SMITHING, 49]
	],
	//Temple of Ikov
	[
		[197, RANGED, 40],
		[198, THIEVING, 42]
	],
	//The Restless Ghost
	[

	],
	
	//Throne of Miscellania
	[

	],
	//Tourist Trap, The
	[
		[199, SMITHING, 20],
		[200, FLETCHING, 10]
	],
	//Tower of Life
	[
		[201, CONSTRUCTION, 10]
	],
	//Tree Gnome Village
	[
	],
	//Tribal Totem
	[
		[202, THIEVING, 21]
	],
	//Troll Romance
	[
		[203, AGILITY, 28]
	],
	//Troll Stronghold
	[
		[204, AGILITY, 15]
	],
	//Underground Pass
	[
		[205, RANGED, 25],
		[206, THIEVING, 50],
		[207, AGILITY, 50]
	],
	//Vampire Slayer
	[

	],
	//Wanted!
	[
		[208, QUESTPOINTS, 32]
	],
	//Watchtower
	[
		[209, HERBLORE, 14],
		[210, MAGIC, 14],
		[211, THIEVING, 15],
		[212, AGILITY, 25],
		[213, MINING, 40]
	],
	//Waterfall Quest
	[

	],
	//What Lies Below
	[
		[214, RUNECRAFTING, 35],
		[215, AGILITY, 21],
		[216, MINING, 42]
	],
	//Witch's House
	[

	],
	//Witch's Potion
	[

	],
	//Zogre Flesh Eaters
	[
		[217, HERBLORE, 8],
		[218, RANGED, 30],
		[219, SMITHING, 4],
		[220, FLETCHING, 30]
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
