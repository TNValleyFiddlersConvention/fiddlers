<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");

	$unique = "";

	// Status of the query for the confirmation message later on	0 = fail, 1 = success
	$query_status = 0;

	// Get the current date for the registration entry
	$now = date("m-d-Y");

	// Check if variables posted from newreg.php (if not, use test data)
	if (isset($_POST['txtContestantNum'])) { $contestant_num = intval($_POST['txtContestantNum']); }
	else { $contestant_num = 99999; }

	if (isset($_POST['txtContestantFName'])) { $contestant_fname = mysql_real_escape_string($_POST['txtContestantFName']); }
	else { $contestant_fname = 'NONE'; }

	if (isset($_POST['txtContestantMI'])) { $contestant_mi = mysql_real_escape_string($_POST['txtContestantMI']); }
	else { $contestant_mi = 'O'; }

	if (isset($_POST['txtContestantLName'])) { $contestant_lname = mysql_real_escape_string($_POST['txtContestantLName']); }
	else { $contestant_lname = 'NONE'; }

	$fullname = $contestant_fname .' ' .$contestant_lname;


	if (isset($_POST['txtDOB']))
	{
		$contestant_dob = $_POST['txtDOB'];
	}
	else
	{
		$contestant_dob = '00/00/0000';
	}


	if (isset($_POST['txtMailAddr'])) { $contestant_addr = mysql_real_escape_string($_POST['txtMailAddr']); }
	else { $contestant_addr = '001 My Address Street'; }

	if (isset($_POST['txtCity'])) { $contestant_city = mysql_real_escape_string($_POST['txtCity']); }
	else { $contestant_city = 'Anywhere'; }

	if (isset($_POST['txtState'])) { $contestant_state = $_POST['txtState']; }
	else { $contestant_state = 'AL'; }

	if (isset($_POST['txtZip'])) { $contestant_zip = $_POST['txtZip']; }
	else { $contestant_zip = '35611'; }

	if (isset($_POST['txtEmail'])) { $contestant_email = mysql_real_escape_string($_POST['txtEmail']); }
	else { $contestant_email = 'somebody@my.athens.edu'; }

	if (isset($_POST['txtPhone'])) { $contestant_phone = $_POST['txtPhone']; }
	else { $contestant_phone = '0000000000'; }

	if (isset($_POST['txtAge'])) { $contestant_age = $_POST['txtAge']; }
	else { $contestant_age = '99'; }

	// Connect to the database (values from dbconfig.php)
	//$db = pg_connect("host=$dbhost port=$dbport dbname=$dbname user=$dbuser password=$dbpswd");
	$db = mysql_connect($host, $username, $password);
	mysql_select_db("fidcon");

	// Get POST variables here and do SQL INSERT
	$result = mysql_query("INSERT INTO contestants (registration_date,
													contestant_no,
													name,
													fname,
													mi,
													lname,
													birth_date,
													address,
													city,
													state,
													zip,
													email,
													phone,
													age
													) VALUES (
													CURDATE(),
													" . $contestant_num . ",
													'" . $fullname . "',
													'" . $contestant_fname . "',
													'" . $contestant_mi . "',
													'" . $contestant_lname . "',
													STR_TO_DATE('$contestant_dob', '%m/%d/%Y'),
													'" . $contestant_addr . "',
													'" . $contestant_city . "',
													'" . $contestant_state . "',
													'" . $contestant_zip . "',
													'" . $contestant_email . "',
													'" . $contestant_phone . "',
													" . $contestant_age . ")" )
													or die(mysql_error());

	if (!$result)
	{
		// Can also use errno code #893 if the below has issues
		// Code 893 is specifically made for Duplicate Errors due to UNIQUE column setting in the DB.
		if ( mysql_errno() == 1586 || mysql_errno() == 893 )
		{ echo "DUPLICATE CONTESTANT NUMBER DETECTED.  TRY AGAIN"; }
		else
		{ echo "ERROR: " .  mysql_error(); }
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
<meta http-equiv="Refresh" content="2;url=index.php" />
</head>
<body bgcolor="#A0CAF9">
	<p align="center">
		<?php
			if ( $query_status == 0 )
			{
				echo "<font face='arial' size='4' color='red'><b>Contestant Entry Failed</b></font>";
				echo "<br /><br /><a href='index.php'>Home</a>";
				echo "<br /> $unique" . $unique;
			}
			if ( $query_status == 1 )
			{
				echo "<font face='arial' size='4' color='green'><b>Contestant Added Successfully!</b></font>";
				echo "<br /><br /><font face='arial' size='3' color='#000000'>Redirecting to previous page in 5 seconds.</font>";
				echo "<br /> " . $unique;
			}
		?>
	</p>
</body>
</html>
