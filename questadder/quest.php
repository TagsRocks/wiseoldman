<?php
$hostname_Database = "localhost";
$database_Database = "rsquest";
$username_Database = "root";
$password_Database = "123";

$mysqli = new mysqli($hostname_Database, $username_Database, $password_Database, $database_Database); 
if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}

//table check
$sql = "   
   CREATE TABLE IF NOT EXISTS quests (
	  quest_ID int(11) AUTO_INCREMENT,
	  quest_name varchar(255) NOT NULL,
	  quest_difficulty varchar(255) NOT NULL,
	  quest_length varchar(255) NOT NULL,
	  quest_points int(10) NOT NULL,
	  quest_type varchar(255) NOT NULL,
	  PRIMARY KEY  (quest_ID)
	  )";
$mysqli->query($sql);
//



$file = 'quest.txt';

$data = file($file) or die('Could not read file!');

foreach ($data as $line)

{


list($quest_name, $quest_difficulty, $quest_length, $quest_points, $quest_type)=explode("<a>",$line);

$quest_name = $mysqli->real_escape_string($quest_name);
$quest_difficulty = $mysqli->real_escape_string($quest_difficulty);
$quest_length = $mysqli->real_escape_string($quest_length);
$quest_points = $mysqli->real_escape_string($quest_points);
$quest_type = $mysqli->real_escape_string($quest_type);

$query = "INSERT INTO quests (`quest_name`,`quest_difficulty`,`quest_length`,`quest_points`,`quest_type`) VALUES ('$quest_name', '$quest_difficulty', '$quest_length', $quest_points, '$quest_type')";

$result = $mysqli->query($query);
if (!$result) {
   printf("%s\n", $mysqli->error);
   exit();
}
}
?>
