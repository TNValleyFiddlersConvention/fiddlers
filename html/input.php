<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
	if($_SESSION['privs'] != 2) header("Location: ./index.php?adminonly");
?>

<html>
	<head>
		<title>ASU - Fiddlers Convention Backstage Management</title>
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
                                                <a href="manage.php"><font face="arial" size="3">Search Events</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href="order.php"><font face="arial" size="3">Sort Event Manually</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="eventorder.php"><font face="arial" size="3">Sort Event Automatically</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href="nextup.php"><font face="arial" size="3">On Stage Management</font></a>&nbsp;&nbsp;&nbsp;   
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<br />
						<table align="center" bgcolor="#FFFFDD" border="1" style="font-family: arial; color: #000000; border-collapse: collapse;">	
						<?php
							echo "<tr align='center'>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Order #</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Contestant #</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>First Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>M.I.</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Last Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Age</b></font></td>";
										echo "</tr>";
										$selected=$_POST['catOrder'];
										$query = "SELECT events.contestant_id, contestants.contestant_no, contestants.fname, contestants.mi, contestants.lname, contestants.age FROM events INNER JOIN contestants ON contestants.contestant_no=events.contestant_id WHERE events.category_id = '$selected' ORDER BY contestants.contestant_no";
								
									
										//CREATE FORM TO SUBMIT VALUES FOR CONTESTANT ORDERING
										echo "<form action='submitOrder.php' action='post'>";
										$category = $selected;
										$results = mysql_query($query);
										$cnt = mysql_num_rows($results);
										$tcnt = $cnt;
										if (!$results)
										{
											echo "Database Query Failed " . $query . "<br />";
											echo mysql_error();
											echo "FAILED";
											exit();
										}
										$counter = 0;
										// Defined in the ./includes/dbconfig.php file
										$c1 = "#BFBFBF";
										$c2 = "#DDDDDD";
										while ( $myrow = mysql_fetch_assoc($results))
										{
										
											$counter= $counter + 1;
											if ( $tcnt % 2 == 0 )
											{
												echo "<tr align='center' bgcolor='" . $c1 . "' style='background-color: " . $c1 . ";'>";
												echo "<td align='left'><input name='$counter' size='3' type='text'></input>";
												echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
												echo "<td align='left'>" . $myrow['fname'] . "</td>";
												echo "<td align='left'>" . $myrow['mi'] . "</td>";
												echo "<td align='left'>" . $myrow['lname'] . "</td>";
												echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
												$array1[$counter]=$myrow['contestant_no'];
											}
											else
											{
												echo "<tr align='center' bgcolor='" . $c2 . "' style='background-color: " . $c2 . ";'>";
												echo "<td align='left'><input name='$counter' type='text' size='3'></input>";
												echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
												echo "<td align='left'>" . $myrow['fname'] . "</td>";
												echo "<td align='left'>" . $myrow['mi'] . "</td>";
												echo "<td align='left'>" . $myrow['lname'] . "</td>";
												echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
												$array1[$counter]=$myrow['contestant_no'];
											}
											$tcnt--;
          								
				
										}
										mysql_free_result($results);
										mysql_close();
										if(isset($array1)) {
										      $pass = serialize($array1);
										}
				?>
				<input type='hidden' id='input_array' name='input_array' value='<?php echo $pass; ?>' />		
				<input type='hidden' id='categories' name='categories' value='<?php echo $category; ?>' />

			</td>
			</tr>
		</table>
			<input type="submit" value="Record"/>
                        </form>	
	</body>
</html>
