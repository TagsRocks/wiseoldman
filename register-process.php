<?php
session_start();
if(isset($_SESSION['username'])) {
	header("location: index.php?registration=fail");
}

if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass_confirmed'])) {
	$mysqli = new mysqli('localhost', 'root', '', 'quest');
	// check to see if user already exists
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$password_c = $_POST['pass_confirmed'];
	$user = $_POST['user'];
	$user = $mysqli->query("SELECT * FROM user WHERE email_address='$email'");
	$error = array();
	if($user->num_rows > 0) {
		//user already exists?
		$error[] = "That email account already exists";
		// gonna end script here
	} 
	$user = $_POST['user'];
	//assuming user does not already exist
	//validate

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error[] = "The submitted email was invalid";
	}

	if(filter_var($password, FILTER_SANITIZE_STRING) != $password) {
		//password is invalid
		$error[] = "The submitted password was invalid";
	}
	if(filter_var($password_c, FILTER_SANITIZE_STRING) != $password_c) {
		//password confirmed is invalid
		$error[] = "The submitted password was invalid";
	}
	if($password != $password_c) {
		//confirmed password does not match password given
		$error[] = "The passwords provided did not match";
	}
	if(filter_var($user, FILTER_SANITIZE_STRING) != $user) {
		// user given had invalid characters
		$error[] = "The username provided was invalid";
	}
	//do some regex to the user, users can only contain char/numbers up to 12 length
	if(strlen($user) > 12) {
		//osrs username too long
		$error[] = "The username provided was too long";
	}
	if(preg_match("/[\s]{2,}/", $user)) {
		//username too many spaces
		$error[] = "Username cannot contain two consecutive spaces";
	} 

	if(count($error) > 0) {
		header("location: index.php?registration=fail");
	} else { 
		$mysqli->query("INSERT INTO user VALUES(0, '$email', '$password', now(), 0)");
		$_SESSION['email'] = $email;
		header("location: index.php?registration=success");
	}
}