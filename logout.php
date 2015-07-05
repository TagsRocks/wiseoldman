<?php

if(isset($_GET['referer'])) {
	$referer = $_GET['referer'];
} else {
	$referer = "index";
}

session_start();
session_destroy();
header("location: $referer.php");
?>