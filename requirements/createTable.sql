use rsquest;

CREATE TABLE IF NOT EXISTS requirements 
	(id int(12) NOT NULL AUTO_INCREMENT, skill_id int(12) NOT NULL DEFAULT 0, skill_level int(12) NOT NULL DEFAULT 0, explanation varchar(255) NOT NULL DEFAULT '', primary key(id));


$requirements = [
	[
		's_id'=>15,
		's_level'=>18,
		'explanation'=>'Required to chop down undead trees at Draynor Manor.'
	],
	[

	]
]

foreach($requirements as $r) {
	INSERT INTO requirements(`skill_id`, `skill_level`, `explanation`) VALUES($r['s_id'], $r['s_level'],
	$r['explanation']);
}
