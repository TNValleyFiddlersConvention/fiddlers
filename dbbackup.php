<?php
	// This page is used to backup the current MySQL database to a file
	// Include the database configuration file
	include("../includes/dbconfig.php");
	$return_val = 0;
	$un = "fiddlersdba";
	$pw = "asu;fiddlers!asu";
	//$now = date("m-d-Y_H:i:s");
	$now = date("m-d-Y");
	$dbname = "fidcon";

	$backup_path = "/var/www/fiddlers/sql/db_full_backup_" . $now . ".sql";
	$cmd = "./database_backup_script.sh";
	exec($cmd, $output, $return_val);
	$return_val = system($cmd);
	if ($return_val > 0 && $return_val != 1) { $a = 2; }
	if ($return_val > 0 && $return_val == 1) { $a = 1; }
	if ($return_val == 0) { $a = 0; }
?>

<html>
<head>
	<meta http-equiv="refresh" content="1;url=index.php" />
	<link href="http://mcs.athens.edu/fiddlers/images/favicon.ico" rel="SHORTCUT ICON" />
</head>
<body bgcolor="#A0CAF9">
	<br />
	<br />
	<br />
	<?php if ($a == 0) {
		echo "<p align='center'><font face='arial' size='4' color='navy'>RUNNING COMMAND: " . $cmd . "</font></p>";
		echo "<p align='center'><font face='arial' size='4' color='navy'>BACKUP_PATH: </font>";
		echo "<font face='arial' size='4' color='maroon'>/var/www/fiddlers/sql/db_full_backup_(CURRENT_DATE).sql</font></p>";
	?>
	<script type="text/javascript" language="javascript">
		alert("Database has been backed up at: /var/www/fiddlers/sql/db_full_backup_(CURRENT_DATE).sql");
	</script>
	<?php } if ($a == 2) { ?>
	<script type="text/javascript" language="javascript">
		alert("Ooops! Something failed.\nPlease try to backup the database manually.");
	</script>
	<?php } if ($a == 1) { ?>
	<script type="text/javascript" language="javascript">
		alert("The command could not be found that is used to backup the database.\n/var/www/fiddlers/sql/database_backup_script.sh");
	</script>
	<?php } ?>
</body>
</html>
