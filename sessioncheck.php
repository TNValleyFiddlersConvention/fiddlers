<?php
  	include("dbconnect.php");
	session_start();
	if(isset($_SESSION['user']) && isset($_SESSION['privs']))	{
		$utext = $_SESSION['user'];
		$privs = $_SESSION['privs'];
		
		$query = mysql_query("SELECT username FROM $tbl_name WHERE username='$utext' AND privs=$privs")
		or die(mysql_error());
		
		if(mysql_num_rows($query) == 1)	{
			$row = mysql_fetch_array($query);
			  session_regenerate_id();
		} else	{
			session_start();
			$_SESSION = array();
			session_destroy();
			header("Location: ./login.php?notlogged");
		}
	} else	{
		session_start();
		$_SESSION = array();
		session_destroy();
		header("Location: ./login.php?notlogged");
	}
?>