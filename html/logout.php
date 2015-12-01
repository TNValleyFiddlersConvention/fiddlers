<?php
	include("./includes/dbconfig.php");
	include("dbconnect.php");
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: ./login.php?loggedout");
?>