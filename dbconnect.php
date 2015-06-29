<?php
  
  $conn = mysql_connect($host, $username, $password)
  or die ("Could not connect to the database.");

  mysql_select_db("$db_name")
  or die("cannot select DB");
  
?>