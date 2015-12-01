<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
	
	// Status of the query for the confirmation message later on	0 = fail, 1 = success
	$query_status = 0;
	
	// Get the current date for the registration entry
	$now = date("m-d-Y");
	$y = date("Y");
	
	// Get POST variable for contestant number
	if ( isset($_POST['txtContestantNum'] ) ) {$contestant_num = intval($_POST['txtContestantNum']); }
	if ( isset($_GET['txtContestantNum'] ) ) { $contestant_num = intval($_GET['txtContestantNum']); }
	else { $contestant_num = 1; }
	
	// Do a DB query to get contestant ID from contestant_name on previous page (use POST variable)
	//$db = pg_connect("host=$dbhost port=$dbport dbname=$dbname user=$dbuser password=$dbpswd") or die ("Could not connect to database");
	$db = mysql_connect($host, $username, $password) or die("Could not connect to the database");
	mysql_select_db("fidcon");

	$query = "SELECT contestant_id FROM contestants WHERE contestant_no = " . $contestant_num . " AND registration_date BETWEEN '01-01-" . $y . "' AND '12-31-" . $y . "'";
	$results = mysql_query($query);
	if (!$results) 
	{
		echo "Database Query Failed " . $query . "<br />";
		echo $query . "<br />";
		echo mysql_error();
		exit();
	}

	$contestant_id = 0;
	while ( $myrow = mysql_fetch_assoc($results))
	{ $contestant_id = $myrow['contestant_id']; }

	// Check if variables posted from newreg.php (if not, use test data)
	if (isset($_POST['txtContestantNum'])) { $contestant_id = intval($_POST['txtContestantNum']); }
	else { $contestant_id = 0; }

	if (isset($_POST['event_category'])) { $category_id = $_POST['event_category']; }
	else { $category_id = 0; }

	if (isset($_POST['txtElimTune1'])) { $elim_tune1 = $_POST['txtElimTune1']; }
	else { $elim_tune1 = 'Test1'; }

	if (isset($_POST['txtElimTune2'])) { $elim_tune2 = $_POST['txtElimTune2']; }
	else { $elim_tune2 = 'Test2'; }

	if (isset($_POST['txtElimTune3'])) { $elim_tune3 = $_POST['txtElimTune3']; }
	else { $elim_tune3 = 'Test3'; }

	if (isset($_POST['txtFinalTune1'])) { $final_tune1 = $_POST['txtFinalTune1']; }
	else { $final_tune1 = 'Test4'; }

	if (isset($_POST['txtFinalTune2'])) { $final_tune2 = $_POST['txtFinalTune2']; }
	else { $final_tune2 = 'Test5'; }

	if (isset($_POST['txtFinalTune3'])) { $final_tune3 = $_POST['txtFinalTune3']; }
	else { $final_tune3 = 'Test6'; }

	if (isset($_POST['txtPosNumElim'])) { $elimposnum = $_POST['txtPosNumElim']; }
	else { $elimposnum = 0; }

	if (isset($_POST['txtPosNumFinal'])) { $finalposnum = $_POST['txtPosNumFinal']; }
	else { $finalposnum = 0; }


	// Get POST variables here and do SQL INSERT
	$result = mysql_query("INSERT INTO events (contestant_id, 
													category_id,
													elimination_tune1, 
													elimination_tune2, 
													elimination_tune3, 
													final_tune1, 
													final_tune2, 
													final_tune3, 
													eliminations_position, 
													finals_position
													) VALUES (
													" . $contestant_id . ",
													" . $category_id . ",
													'" . $elim_tune1 . "',
													'" . $elim_tune2 . "',
													'" . $elim_tune3 . "',
													'" . $final_tune1 . "',
													'" . $final_tune2 . "',
													'" . $final_tune3 . "',
													" . $elimposnum . ",
													" . $finalposnum . ")" );
	if (!$result) 
	{
		mysql_query("ROLLBACK");
		$query_status = 0;
	} 
	else 
	{
		mysql_query("COMMIT");
		$query_status = 1;
	}
?>

<html>
<head>
<title>ASU - Fiddlers Convention Registration Submit Page</title>
<link rel="stylesheet" href="./css/main.css" type="text/css" media="screen"></script>
<meta http-equiv="Refresh" content="5;url=index.php" />
</head>
<body bgcolor="#A0CAF9">
	<p align="center">
		<?php 
			if ( $query_status == 0 )
			{
				echo "<font face='arial' size='4' color='red'><b>Contestant Entry Failed</b></font>";
				echo "<br /><br /><a href='index.php'>Home</a>";
			}
			if ( $query_status == 1 )
			{
				echo "<font face='arial' size='4' color='green'><b>Contestant Added Successfully!</b></font>";
				echo "<br /><br /><font face='arial' size='3' color='#000000'>Redirecting to previous page in 5 seconds.</font>";
			}
		?>
	</p>
</body>
</html>
