<?php
  include("./includes/dbconfig.php");

  /* WRITE USER NAME TO TEMP FILE 'utext.txt' */
  $filename = 'utext.txt';
  $Content = $_POST['utext'];  // . "\r\n";
  
  if (!file_exists($filename))	{
	$handle = fopen($filename, 'x+');
	fwrite($handle, $Content);
	fclose($handle);
  }
  
  include("dbconnect.php");
  
  // username and password sent from form
  if(isset($_POST['utext']) && isset($_POST['ptext'])) {
    $utext=$_POST['utext'];
    $ptext=$_POST['ptext'];
  }
  
  // To protect MySQL injection (more detail about MySQL injection)
  $utext = stripslashes($utext);
  $ptext = stripslashes($ptext);
  $utext = mysql_real_escape_string($utext);
  $ptext = mysql_real_escape_string($ptext);
  
  $result = mysql_query	("SELECT * FROM $tbl_name WHERE
			    username='$utext' AND password='$ptext'
			 ") or die(mysql_error());
  
  $count = mysql_num_rows($result);
  
  if( $count == 1 ) {
    session_start();
    $row = mysql_fetch_array($result);

    $_SESSION['user'] = $utext;
    $_SESSION['privs'] = $row['privs'];
    
    session_regenerate_id();
    header("Location: index.php");
    mysql_close();
    exit();
  } else {
    header("Location: login.php?badlogin");
    mysql_close();
    exit();
  }
?>