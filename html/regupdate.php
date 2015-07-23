<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");

	// Handle the DOB
	if ( isset($_POST['txtContestantDOB']) )
	{
	        $doby = substr($_POST['txtContestantDOB'], 6, 4);
        	$dobm = substr($_POST['txtContestantDOB'], 0, 2);
	        $dobd = substr($_POST['txtContestantDOB'], 3, 2);
        	$cdob = $doby . "-" . $dobm . "-" . $dobd;
	}
	else
	{
		$cdob = "0000-00-00";
	}

	// Status of the query for the confirmation message later on	0 = fail, 1 = success
	$query_status = 0;

	// Do the SQL update here
	//$result = mysql_query("UPDATE contestants SET name = '" . $_POST['txtContestantName'] . "', address = '" . $_POST['txtStreetAddr'] . "', city = '" . $_POST['txtCity'] . "', state = '" . $_POST['txtState'] . "', zip = '" . $_POST['txtZip'] . "', email = '" . $_POST['txtEmail'] . "', phone = '" . $_POST['txtPhone'] . "', age = " . $_POST['txtAge'] . " WHERE contestant_no = " . $_POST['txtContestantNum'] . "");
	$result = "";
	if ( isset($_POST['hCID']) )
	{
		$result = mysql_query("UPDATE contestants SET contestant_no = '" . $_POST['txtContestantNum'] . "', fname = '" . mysql_real_escape_string($_POST['txtContestantFName']) . "', mi = '" . mysql_real_escape_string($_POST['txtContestantMI']) . "', lname = '" . mysql_real_escape_string($_POST['txtContestantLName']) . "', birth_date = STR_TO_DATE('" . $cdob . "', '%m/%d/%Y'), address = '" . mysql_real_escape_string($_POST['txtMailAddr']) . "', city = '" . mysql_real_escape_string($_POST['txtCity']) . "', state = '" . $_POST['txtState'] . "', zip = '" . $_POST['txtZip'] . "', email = '" . mysql_real_escape_string($_POST['txtEmail']) . "', phone = '" . $_POST['txtPhone'] . "', age = " . $_POST['txtAge'] . " WHERE contestant_id = " . $_POST['hCID'] . "");
	}
	else
	{
		$result = mysql_query("UPDATE contestants SET fname = '" . mysql_real_escape_string($_POST['txtContestantFName']) . "', mi = '" . mysql_real_escape_string($_POST['txtContestantMI']) . "', lname = '" . mysql_real_escape_string($_POST['txtContestantLName']) . "', birth_date = '" . $cdob . "', address = '" . mysql_real_escape_string($_POST['txtMailAddr']) . "', city = '" . mysql_real_escape_string($_POST['txtCity']) . "', state = '" . $_POST['txtState'] . "', zip = '" . $_POST['txtZip'] . "', email = '" . mysql_real_escape_string($_POST['txtEmail']) . "', phone = '" . $_POST['txtPhone'] . "', age = " . $_POST['txtAge'] . " WHERE contestant_no = " . $_POST['txtContestantNum'] . "");
	}

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
	<meta http-equiv="refresh" content="2;url=index.php" />
</head>
<body bgcolor="#A0CAF9">
	<p align="center">
		<?php
			if ( $query_status == 0 )
			{
				echo "<font face='arial' size='4' color='red'><b>Contestant Entry Failed</b></font>";
			}
			if ( $query_status == 1 )
			{
				echo "<font face='arial' size='4' color='green'><b>Contestant Updated Successfully!</b></font>";
			}
		?>
	</p>
</body>
</html>
