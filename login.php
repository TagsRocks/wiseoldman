<?php
session_start();
require "Entities/User.php";

if(isset($_GET['referer'])) {
	$referer = $_GET['referer'];
} else {
	$referer = "index";
}

if(isset($_POST['email']) && isset($_POST['password'])) {
	$id = get_user_id($_POST['email']);
	$password = $_POST['password'];
	$user = new User($id);
	$hash = $user->get_password();

	if(md5($password) == $hash) {
		$_SESSION['user'] = $user->get_email();
		header("location: $referer.php?login=success");
	} else {
		header("location: $referer.php?login=fail");
	}
}

function get_user_id($email) {
	$connection = new Connection();
	$result = $connection->get_connection()->query("SELECT * FROM users WHERE email='$email'");
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			return $row['user_id'];
		}
	}
}