<?php

$mysqli = new mysqli('localhost', 'root', '', 'rsquest');

$mysqli->query("CREATE TABLE IF NOT EXISTS quest_to_quest_requirement(
	quest_id int(12) NOT NULL default 0,
	quest_requirement_quest int(12) NOT NULL default 0,
	primary key(quest_id, quest_requirement_quest)
	)");

?>