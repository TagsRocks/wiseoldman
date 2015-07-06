<?php

include "Entities/LoginController.php";

$login = new LoginController(
	$_POST['email'],
	$_POST['password'],
	$_GET['referer']
);

?>
