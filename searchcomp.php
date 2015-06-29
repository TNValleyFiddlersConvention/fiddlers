<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
?>

<html>
	<head>
		<title>ASU - Fiddlers Convention Registration Form</title>
		<link rel="stylesheet" href="./css/main.css" type="text/css" media="screen"></script>
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
						<a href="searchcomp.php"><font face="arial" size="3">Search Competitors</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="searchevent.php"><font face="arial" size="3">Search Events</font></a>
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<br />
					<form name="fcForm" method="post" action="searchcomp.php">
					<table align="center" border="0">
						<tr align="center">
							<td align="center">
								<font face="arial" size="3" color="#000000">Competitor Search: </font>
								<input type="text" id="txtSearchContestant" name="txtSearchContestant" />&nbsp;
								<input type="submit" value="Search" />
								</form>
							</td>
						</tr>
						<?php if(isset($_GET['delete_con']) && !isset($_POST['confDel'])) { ?>
						<tr>
							<td style="text-align: center; color: black;">
								<?php
								      $connum = $_GET['delete_con'];
								      $result = mysql_query("SELECT fname,mi,lname,age FROM contestants WHERE contestant_no=$connum") or die(mysql_error());
								      if (mysql_num_rows($result) == 1) {
									    $row = mysql_fetch_array($result);
									    echo "<br /><br />Are you sure you want to delete <b>" . $connum  . " - " . $row['fname'] . " " . $row['mi'] . " " . $row['lname'] . " (age: " . $row['age'] . ")</b> from the database?<br /><b>This action is irreversible.</b><br /><br />";
									    ?>
									    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" />
									    <input type="submit" value="Cancel" />
									    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" />
									    <input type="hidden" name="delete_con" value="<?php echo $connum; ?>" />
									    <input type="submit" name="confDel" value="Confirm" />
									    </form>
								     <?php } else {
									    echo "DELETION ERROR";
								      }
								?>
							</td>
						</tr>
						<?php } else if(isset($_POST['delete_con']) && isset($_POST['confDel'])) { ?>
						<tr>
							<td style="text-align: center; color: red;">
								<?php
								      $connum = $_POST['delete_con'];
								      $result = mysql_query("SELECT fname,mi,lname,age FROM contestants WHERE contestant_no=$connum") or die(mysql_error());
								      if (mysql_num_rows($result) == 1) {
									    $row = mysql_fetch_array($result);
									    mysql_query("DELETE FROM contestants WHERE contestant_no=$connum") or die(mysql_error());
									    mysql_query("DELETE FROM events WHERE contestant_id=$connum") or die(mysql_error());
									    echo "<br /><br /><b>" . $connum  . " - " . $row['fname'] . " " . $row['mi'] . " " . $row['lname'] . " (age: " . $row['age'] . ")</b> has been deleted from the database and removed from all events.";
								      } else {
									    echo "DELETION ERROR";
								      }
								?>
							</td>
						</tr> <?php } ?>
						<tr align="center">
							<td align="center">
								<br />
								<br />
								<table align="center" width="850" cellpadding="5" cellspacing="0" bgcolor="#FFFFDD" border="1" style="border-collapse: collapse; font-family: arial; color: #000000; ">

								<?php 
									// Do the SQL query of contestants per category selected from the dropdown list box
									// Return a new results table each time the dropdown list selection is updated

									// Get the Competitor Search Value and do a SQL query for a possible match
									if ( isset($_POST['txtSearchContestant']) ) {
										$query = "";
										if ( $_POST['txtSearchContestant'] == "" )
										{
											$query = "SELECT contestant_id, contestant_no, fname, mi, lname, age FROM contestants ORDER BY contestant_no";
										} else {
											if(is_numeric($_POST['txtSearchContestant'])) {
											      $searchInt = $_POST['txtSearchContestant'];
											      $query = "SELECT 
													  contestant_id, 
													  contestant_no, 
													  fname, 
													  mi, 
													  lname, 
													  age
													FROM contestants
													WHERE contestant_no=$searchInt";
											} else {
											      $searchStringAry = explode(" ",$_POST['txtSearchContestant']);
											      foreach($searchStringAry as $ssa)	{
												    if(isset($searchString)) {
													  $searchString = "+" . $searchString . " +" . $ssa;
												    } else {
													  $searchString = "+" . $ssa;
												    }
											      }
											      $query = "SELECT 
													  contestant_id, 
													  contestant_no, 
													  fname, 
													  mi, 
													  lname, 
													  age
													FROM contestants 
													WHERE MATCH (
													  fname,
													  mi,
													  lname
													)
													AGAINST ('$searchString' IN BOOLEAN MODE) 
													ORDER BY contestant_no";
											}
										}
										$results = mysql_query($query);
										$cnt = mysql_num_rows($results);
										if (!$results)
										{
											echo "Database Query Failed " . $query . "<br />";
											echo mysql_error();
											exit();
										}
										if ( $cnt > 0 )
										{
											echo "<tr align='center'>";
											echo "<td align='left'><font face='arial' size='3' color='navy'><b>Contestant #</b></font></td>";
											echo "<td align='left'><font face='arial' size='3' color='navy'><b>First Name</b></font></td>";
											echo "<td align='left'><font face='arial' size='3' color='navy'><b>M.I.</b></font></td>";
											echo "<td align='left'><font face='arial' size='3' color='navy'><b>Last Name</b></font></td>";
											echo "<td align='left'><font face='arial' size='3' color='navy'><b>Age</b></font></td>";
											echo "<td align='center'><font face='arial' size='3' color='navy'><b>Add Event</b></font></td>";
											echo "<td align='center'><font face='arial' size='2' color='navy'><b>View / Edit Events</b></font></td>";
											echo "<td align='center'><font face='arial' size='3' color='navy'><b>Edit Contestant</b></font></td>";
											echo "<td align='center'><font face='arial' size='3' color='navy'><b>Event Results</b></font></td>";
											echo "<td align='center'><font face='arial' size='3' color='navy'><b>Delete Contestant</b></font></td>";
											echo "</tr>";

											// Defined in the ./includes/dbconfig.php file
											//$c1 = "#DDDDDD";
											//$c2 = "#BFBFBF";
											$tcnt = $cnt;

											while ( $myrow = mysql_fetch_assoc($results))
											{
												if ( $tcnt % 2 == 0 )
												{
													echo "<tr align='center' bgcolor='" . $c1 . "' style='background-color: " . $c1 . ";'>";
													echo "<td align='left' width='13%'>" . $myrow['contestant_no'] . "</td>";
													echo "<td align='left' width='11%'>" . $myrow['fname'] . "</td>";
													echo "<td align='left' width='5%'>" . $myrow['mi'] . "</td>";
													echo "<td align='left' width='11%'>" . $myrow['lname'] . "</td>";
													echo "<td align='left' width='5%'>" . $myrow['age'] . "</td>";
													echo "<td align='center' width='11%'><a href='newevent.php?contestant_no=" . $myrow['contestant_no'] . "'>Add</a></td>";
													echo "<td align='center' width='11%'><a href='editevent.php?contestant_no=" . $myrow['contestant_no'] . "'>View / Edit</a></td>";
													echo "<td align='center' width='11%'><a href='editreg.php?contestant_no=" . $myrow['contestant_no'] . "'>Edit</a></td>";
													echo "<td align='center' width='11%'><a href='eventresults.php?contestant_no=" . $myrow['contestant_no'] . "'>Results</a></td>";
													echo "<td align='center' width='11%'><a href='searchcomp.php?delete_con=" . $myrow['contestant_no'] . "'>Delete</a></td>";
												} else {
													echo "<tr align='center' bgcolor='" . $c2 . "' style='background-color: " . $c2 . ";'>";
													echo "<td align='left' width='13%'>" . $myrow['contestant_no'] . "</td>";
													echo "<td align='left' width='11%'>" . $myrow['fname'] . "</td>";
													echo "<td align='left' width='5%'>" . $myrow['mi'] . "</td>";
													echo "<td align='left' width='11%'>" . $myrow['lname'] . "</td>";
													echo "<td align='left' width='5%'>" . $myrow['age'] . "</td>";
													echo "<td align='center' width='11%'><a href='newevent.php?contestant_no=" . $myrow['contestant_no'] . "'>Add</a></td>";
													echo "<td align='center' width='11%'><a href='editevent.php?contestant_no=" . $myrow['contestant_no'] . "'>View / Edit</a></td>";
													echo "<td align='center' width='11%'><a href='editreg.php?contestant_no=" . $myrow['contestant_no'] . "'>Edit</a></td>";
													echo "<td align='center' width='11%'><a href='eventresults.php?contestant_no=" . $myrow['contestant_no'] . "'>Results</a></td>";
													echo "<td align='center' width='11%'><a href='searchcomp.php?delete_con=" . $myrow['contestant_no'] . "'>Delete</a></td>";
												}
												$tcnt--;

											}
										}
										else
										{
											echo "<input type='button' value='Add Contestant' onClick=" . "parent.location='newreg.php'" . " />";

										}
										mysql_free_result($results);
										mysql_close();
									}
								?>

								</table>
							</td>
						</tr>
						<tr align="center">
								<td align="center">
									<br />
								</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
