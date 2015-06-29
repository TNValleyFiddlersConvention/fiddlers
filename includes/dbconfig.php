<?php
	// CONFIGURATION FILE FOR THE DATABASE CONNECTION AND LOGIN 
	// MySQL Database Connection Information
	$host="localhost";
	//$username="fidcon"; // Mysql username
	$username="admin";
	//$password="password"; // Mysql password
	$password="admin";
	$db_name="fidcon"; // Database name
	$tbl_name="users"; // Table name

	global $my;
	if(isset($utext) && isset($ptext))	{
	  $ut = $utext;				//User:  Temp Storage
	  $pt = $ptext;				//Pswd:  Temp Storage
	}

	$c1 = "#BFBFBF";			// Alternating Table Row Color #1 for Search Queries
	$c2 = "#DDDDDD";			// Alternating Table Row Color #2 for Search Queries
?>
