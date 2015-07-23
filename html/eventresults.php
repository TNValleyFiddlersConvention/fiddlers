<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");

	
	// Get the current date for the registration entry
	$now = date("m-d-Y");
	$y = date("Y");
	
	// Get the contestant_no from the GET variable (from the URL in the address bar)
	$contestant_id = 0;
	if (isset($_GET['contestant_no']))
	{
		$contestant_num = $_GET['contestant_no'];
		$query = "SELECT contestant_id FROM contestants WHERE contestant_no = " . $contestant_num . " AND contestants.registration_date BETWEEN '01-01-" . $y . "' AND '12-31-" . $y . "'";
		$results = mysql_query($query);
		if (!$results) 
		{
			echo "Database Query Failed " . $query . "<br />";
			echo mysql_error();
			exit();
		}
		while ( $myrow = mysql_fetch_assoc($results))
		{ $contestant_id = $myrow['contestant_id']; }
		mysql_free_result($results);									
	}
	
?>

<html>
	<head>
		<title>ASU - Fiddlers Convention Contestant Event Results</title>
		<link rel="stylesheet" href="./css/main.css" type="text/css" media="screen">
		<script type="text/javascript" language="javascript">
			function printDiv(divName) 
			{
				 var printContents = document.getElementById(divName).innerHTML;
				 var originalContents = document.body.innerHTML;
				 document.body.innerHTML = printContents;
				 window.print();
				 document.body.innerHTML = originalContents;
			}
		</script>
		
	</head>
	<body bgcolor="#A0CAF9">	
		<table align="center">
			<tr align="center">
				<td align="center">
					<p align="center"><font face="arial" size="6" color="#000000"><b>Tennessee Valley Old Time Fiddlers Convention</b></font></p>
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<?php include("menubar.php"); ?>
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<br />
					<p align="center">
						<font face="arial" size="3" color="#000000"><b>Contestant #:</b></font>&nbsp;&nbsp;
						<font face="arial" size="3" color="#000000"><b><?php if(isset($_GET['contestant_no'])) echo $_GET['contestant_no']; else echo "No contestant selected."; ?></b></font>
					</p>
					<form name="fcForm" method="post" action="searchreg.php">
					<div id="printTable">
					<table align="center" border="0">
						<tr align="center">
							<td align="center">
								<br />
								<br />
								<table align="center" width="700" bgcolor="#FFFFDD" border="1" style="font-family: arial; color: #000000; ">
								<tr align="center">
									<td align="center"><font face="arial" size="3" color="navy"><b>Category Name</b></font></td>
									<td align="center"><font face="arial" size="3" color="navy"><b>Eliminations Place</b></font></td>
									<td align="center"><font face="arial" size="3" color="navy"><b>Finals Place</b></font></td>
								</tr>
								<?php 
								
									// Do the SQL query to get events for this contestant_id
									$query = "SELECT categories.category_name, events.eliminations_place, events.finals_place FROM categories, events WHERE contestant_id = " . $contestant_id . " AND events.category_id = categories.category_id AND events.event_year = '" . $y . "'";
									$results = mysql_query($query);
									if (!$results) 
									{
										echo "Database Query Failed " . $query . "<br />";
										echo mysql_error();
										exit();
									}
									while ( $myrow = mysql_fetch_assoc($results))
									{ 
										echo "<tr align='center'><td align='left'>" . $myrow['category_name'] . "</td><td align='left'>" . $myrow['eliminations_place'] . "</td><td align='left'>" . $myrow['finals_place'] . "</td></tr>";
									}
									mysql_free_result($results);	
									
								?>
								
								</table>
							</td>
						</tr>
						<tr align="center">
								<td align="center">
									<br />
									<!-- GO TO regsubmit.php -->
									<input type="button" onClick="printDiv('printTable');" value="Print Reults" />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<!-- GO TO HOME PAGE -->
									<input type="button" value="Cancel" onClick="parent.location='index.php'" />
								</td>
						</tr>
					</table>
					</div>
					</form>
				</td>
			</tr>
		</table>	
	</body>
</html>