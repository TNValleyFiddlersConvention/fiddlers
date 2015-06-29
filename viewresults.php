<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
	if($_SESSION['privs'] != 2) header("Location: ./index.php?adminonly");
?>



<html>
	<head>
		<title>ASU - Fiddlers Convention Judging Input</title>
		<link rel="stylesheet" href="./css/main.css" type="text/css" media="screen"></script>
		<link rel="stylesheet" href="./css/print.css" type="text/css" media="print">
	<script type="text/javascript">
	function printpage() {
	window.print()
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
						<a href="judge.php"><font face="arial" size="3">Begin Judging</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href="viewresults.php"><font face="arial" size="3">View All Results</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="resetjudge.php"><font face="arial" size="3">Reset Results</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<br />
						<table align="center" bgcolor="#FFFFDD" border="1" style="font-family: arial; color: #000000; border-collapse: collapse;">	
						<?php
						
										echo "<tr align='center'>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Event</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Place</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Contestant #</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>First Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>M.I.</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Last Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Age</b></font></td>";
										echo "</tr>";
										
	$query = "SELECT
			enames.event_name, 
			events.results,
			events.contestant_id, 
			contestants.contestant_no, 
			contestants.fname, 
			category_id, 
			contestants.mi, 
			contestants.lname, 
			contestants.age 
		  FROM events 
		  JOIN enames
		  ON enames.event_no=events.category_id
		  INNER JOIN contestants 
		  ON contestants.contestant_no=events.contestant_id 
		  ORDER BY category_id, events.results";
								
										//OUTPUT CONTESTANT ORDERING
										$results2 = mysql_query($query);
										$cnt = mysql_num_rows($results2);
										$tcnt = $cnt;
										if (!$results2) {
											echo "Database Query Failed " . $query . "<br />";
											echo mysql_error();
											echo "FAILED";
											exit();
										}
										// Defined in the ./includes/dbconfig.php file
										$c1 = "#BFBFBF";
										$c2 = "#DDDDDD";
										while ( $myrow = mysql_fetch_assoc($results2))
										{
											if($myrow['results']>0)
											{									
											if ( $tcnt % 2 == 0 )
											{
												echo "<tr align='center' bgcolor='" . $c1 . "' style='background-color: " . $c1 . ";'>";
												if(isset($myrow['event_name'])) {
												echo "<td align='left'>" . $myrow['event_name'] ."</td>";
												} else {
												echo "<td align='left'></td>";
												}
												echo "<td align='left'>" . $myrow['results'] ."</td>";
												echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
												echo "<td align='left'>" . $myrow['fname'] . "</td>";
												echo "<td align='left'>" . $myrow['mi'] . "</td>";
												echo "<td align='left'>" . $myrow['lname'] . "</td>";
												echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
											}
											else
											{
												echo "<tr align='center' bgcolor='" . $c2 . "' style='background-color: " . $c2 . ";'>";
												if(isset($myrow['event_name'])) {
												echo "<td align='left'>" . $myrow['event_name'] ."</td>";
												} else {
												echo "<td align='left'></td>";
												}
												echo "<td align='left'>" . $myrow['results'] ."</td>";
												echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
												echo "<td align='left'>" . $myrow['fname'] . "</td>";
												echo "<td align='left'>" . $myrow['mi'] . "</td>";
												echo "<td align='left'>" . $myrow['lname'] . "</td>";
												echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
											}
											$tcnt--;
          										}
				
										}
									
										mysql_free_result($results2);
										mysql_close();
										
										?>
										</td>
			</tr>
		</table>
										<input type="button" value="Print Results" onclick="printpage()"/>	
</body>
</html>
