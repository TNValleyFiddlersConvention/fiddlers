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
							$selected=$_GET['catOrder'];
							$ondeck=$_GET['tracker'];
							$query = mysql_query("SELECT category_name FROM categories WHERE category_id=$selected") or die(mysql_error());
							$row = mysql_fetch_array($query);
							echo "<h1>Event: " . $row['category_name'] . "</h1>";
							echo "<h2>Contestant On Stage</h2>";
							echo "<tr align='center'>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Order #</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Contestant #</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>First Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>M.I.</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Last Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Age</b></font></td>";
										echo "</tr>";
										
								mysql_query("UPDATE events SET on_stage=0 WHERE category_id!='$selected'");
								mysql_query("UPDATE events SET on_stage='0' WHERE on_stage ='1' AND category_id = '$selected'");	
								$result = mysql_query("SELECT 
								      contestants.fname AS fname,
								      contestants.mi AS mi,
								      contestants.lname AS lname,
								      events.on_stage,
								      events.order_no,
								      categories.category_name AS category_name
								FROM events
								JOIN contestants ON contestants.contestant_no=events.contestant_id
								JOIN categories ON categories.category_id=events.category_id
								WHERE on_stage=1
								") or die(mysql_error());
							  
							  $filen = "onstage.xml";
							  $f1 = fopen($filen, 'w');
							  $file_string = "<?xml version='1.0' encoding='UTF-8'?><rss version='2.0'><channel><title>CONTESTANT ON STAGE</title>";
							  while($row = mysql_fetch_array($result)) {
								$file_string = $file_string . "<item><title>" . $row['fname'] . " " . $row['mi'] . " " . $row['lname'] . " - " . $row['category_name'] . "</title></item>";
							  }
							  $file_string = $file_string . "</channel></rss>";
							  fwrite($f1,$file_string);
							  fclose($f1);
							  
							  $result = mysql_query("SELECT contestants.fname AS fname,
								      contestants.mi AS mi,
								      contestants.lname AS lname,
								      events.on_stage,
								      events.order_no,
								      categories.category_name AS category_name
								FROM events
								JOIN contestants ON contestants.contestant_no=events.contestant_id
								JOIN categories ON categories.category_id=events.category_id
								WHERE order_no=(SELECT order_no FROM events WHERE on_stage=1)+1 AND events.category_id=(SELECT category_id FROM events WHERE on_stage=1)") or die(mysql_query());
								
							$filen = "nextup.xml";
							$f1 = fopen($filen, 'w');
							$file_string = "<?xml version='1.0' encoding='UTF-8'?><rss version='2.0'><channel><title>NEXT ON STAGE</title>";
							while($row = mysql_fetch_array($result)) {
							    $file_string = $file_string . "<item><title>" . $row['fname'] . " " . $row['mi'] . " " . $row['lname'] . " - " . $row['category_name'] . "</title></item>";
							}
							$file_string = $file_string . "</channel></rss>";
							fwrite($f1,$file_string);
							fclose($f1);
								
$query = "SELECT events.order_no, events.on_stage, events.contestant_id, contestants.contestant_no, contestants.fname, contestants.mi, contestants.lname, contestants.age FROM events INNER JOIN contestants ON contestants.contestant_no=events.contestant_id WHERE events.category_id = '$selected' AND events.order_no = '$ondeck'";
										
										//CREATE FORM TO SUBMIT VALUES FOR CONTESTANT ORDERING
										echo "<form action='onstage.php' action='post'>";
										$category = $selected;
										$results = mysql_query($query);
										$cnt = mysql_num_rows($results);
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
										
										if ( $myrow = mysql_fetch_assoc($results))
										{
										$contestant = $myrow['contestant_no'];
										mysql_query("UPDATE events SET on_stage='1' WHERE contestant_id ='$contestant' AND category_id = '$selected'");
												echo "<tr align='center' bgcolor='" . $c1 . "' style='background-color: " . $c1 . ";'>";
												echo "<td align='left'>" . $myrow['order_no'] . "</td>";
												echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
												echo "<td align='left'>" . $myrow['fname'] . "</td>";
												echo "<td align='left'>" . $myrow['mi'] . "</td>";
												echo "<td align='left'>" . $myrow['lname'] . "</td>";
												echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
												echo "<input type='hidden' name='tracker' value='<?php echo $counter ?>'/>";
												$ondeck = $myrow['order_no'] + 1;
										}
										else{
										echo "<h2>That is the end of the competition</h2><br>";
										}

$query2 = "SELECT events.order_no, events.on_stage, events.contestant_id, contestants.contestant_no, contestants.fname, contestants.mi, contestants.lname, contestants.age FROM events INNER JOIN contestants ON contestants.contestant_no=events.contestant_id WHERE events.category_id = '$selected' AND events.order_no>(SELECT order_no FROM events WHERE on_stage=1) ORDER by events.order_no";
                								$results2 = mysql_query($query2);
                                                                                if (!$results2)
                                                                                {
                                                                                        echo "Database Query Failed " . $query . "<br />";
                                                                                        echo mysql_error();
                                                                                        echo "FAILED";
                                                                                        exit();
                                                                                }
                                                                                // Defined in the ./includes/dbconfig.php file
                                                                                $c1 = "#BFBFBF";
                                                                                $c2 = "#DDDDDD";
										echo '<table align="center" bgcolor="#FFFFDD" border="1" style="font-family: arial; color: #000000; border-collapse: collapse;">';
										echo "<h2>In Queue</h2>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Order #</b></font></td>";
                                                                                echo "<td align='center'><font face='arial' size='3' color='navy'><b>Contestant #</b></font></td>";
                                                                                echo "<td align='center'><font face='arial' size='3' color='navy'><b>First Name</b></font></td>";
                                                                                echo "<td align='center'><font face='arial' size='3' color='navy'><b>M.I.</b></font></td>";
                                                                                echo "<td align='center'><font face='arial' size='3' color='navy'><b>Last Name</b></font></td>";
                                                                                echo "<td align='center'><font face='arial' size='3' color='navy'><b>Age</b></font></td>";
                                                                                echo "</tr>";
                                                                                while ( $myrow = mysql_fetch_assoc($results2))
                                                                                {
                                                                                                echo "<tr align='center' bgcolor='" . $c1 . "' style='background-color: " . $c1 . ";'>";
                                                                                                echo "<td align='left'>" . $myrow['order_no'] . "</td>";
                                                                                                echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
                                                                                                echo "<td align='left'>" . $myrow['fname'] . "</td>";
                                                                                                echo "<td align='left'>" . $myrow['mi'] . "</td>";
                                                                                                echo "<td align='left'>" . $myrow['lname'] . "</td>";
                                                                                                echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
                                                                                                echo "<input type='hidden' name='tracker' value='<?php echo $counter ?>'/>";
                                                                                }
                                          $result = mysql_query("SELECT 
								      contestants.fname AS fname,
								      contestants.mi AS mi,
								      contestants.lname AS lname,
								      events.on_stage,
								      events.order_no,
								      categories.category_name AS category_name
								FROM events
								JOIN contestants ON contestants.contestant_no=events.contestant_id
								JOIN categories ON categories.category_id=events.category_id
								WHERE on_stage=1
							  ") or die(mysql_error());
							  
							  $filen = "onstage.xml";
							  $f1 = fopen($filen, 'w');
							  $file_string = "<?xml version='1.0' encoding='UTF-8'?><rss version='2.0'><channel><title>CONTESTANT ON STAGE</title>";
							  while($row = mysql_fetch_array($result)) {
								$file_string = $file_string . "<item><title>" . $row['fname'] . " " . $row['mi'] . " " . $row['lname'] . " - " . $row['category_name'] . "</title></item>";
							  }
							  $file_string = $file_string . "</channel></rss>";
							  fwrite($f1,$file_string);
							  fclose($f1);
							  
							    $result = mysql_query("SELECT contestants.fname AS fname,
								      contestants.mi AS mi,
								      contestants.lname AS lname,
								      events.on_stage,
								      events.order_no,
								      categories.category_name AS category_name
								FROM events
								JOIN contestants ON contestants.contestant_no=events.contestant_id
								JOIN categories ON categories.category_id=events.category_id
								WHERE order_no=(SELECT order_no FROM events WHERE on_stage=1)+1 AND events.category_id=(SELECT category_id FROM events WHERE on_stage=1)") or die(mysql_query());
								
							$filen = "nextup.xml";
							$f1 = fopen($filen, 'w');
							$file_string = "<?xml version='1.0' encoding='UTF-8'?><rss version='2.0'><channel><title>NEXT ON STAGE</title>";
							while($row = mysql_fetch_array($result)) {
							    $file_string = $file_string . "<item><title>" . $row['fname'] . " " . $row['mi'] . " " . $row['lname'] . " - " . $row['category_name'] . "</title></item>";
							}
							$file_string = $file_string . "</channel></rss>";
							fwrite($f1,$file_string);
							fclose($f1);

								mysql_free_result($results);
								mysql_free_result($results2);
									mysql_close();
				?>

			</td>
			</tr>
		</table><br>
			<input type='hidden' id='tracker' name='tracker' value='<?php echo $ondeck; ?>' />		
			<input type='hidden' id='catOrder' name='catOrder' value='<?php echo $selected; ?>' />
			<input type="submit" value="Next Contestant"/>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="resetqueue.php?catOrder=<?php echo $selected; ?>">Reset Queue</a>
                        </form>	
</html>
