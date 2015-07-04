<?php
session_start();
if(isset($_POST['email']) && isset($_POST['password'])) {
	$mysqli = new mysqli('localhost', 'root', '', 'quest');
	$email = $_POST['email'];
	$password = $_POST['password'];
	$user = $mysqli->query("SELECT * FROM user WHERE email_address='$email' AND password='$password'");
	
	if($user->num_rows == 1) {
		//they can be logged in as this user
		while($u = $user->fetch_assoc()) {
			$_SESSION['email'] = $email;
			header("location: index.php?login=success");
		}
	}
}
?>