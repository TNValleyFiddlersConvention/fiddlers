<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
?>

<html>
	<head>
		<title>ASU - Fiddlers Convention Backstage Management</title>
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
                                                <a href="listcon.php"><font face="arial" size="3">Search Events</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
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
									$input1 = $_REQUEST["input_array"];
									$contestant1 = unserialize(stripslashes($input1));
									$db = mysql_connect($host, $username, $password);
									mysql_select_db("fidcon");
							echo "<tr align='center'>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Place</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Contestant #</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>First Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>M.I.</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Last Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Age</b></font></td>";
										echo "</tr>";
										$selected = $_GET['categories'];
								
										$j=1;
										while($_GET[$j])
										{
											$position[$j]= $_GET[$j];
											if($position[$j]!=NULL)
											{	
																	  	
				$res = mysql_query("UPDATE events SET results='$position[$j]' WHERE contestant_id = '$contestant1[$j]' AND category_id = '$selected'") or die(mysql_error());
											
											mysql_query($res);
											}
											$j = $j+1;
										}
									
										mysql_free_result($results);					
										$query = "SELECT events.results, events.contestant_id, contestants.contestant_no, contestants.fname, contestants.mi, contestants.lname, contestants.age FROM events INNER JOIN contestants ON contestants.contestant_no=events.contestant_id WHERE events.category_id = '$selected' ORDER BY events.results";
								
									
										//OUTPUT CONTESTANT ORDERING
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
										// Defined in the ./includes/dbconfig.php file
										$c1 = "#BFBFBF";
										$c2 = "#DDDDDD";
										while ( $myrow = mysql_fetch_assoc($results))
										{
										
											if ( $tcnt % 2 == 0 )
											{
												echo "<tr align='center' bgcolor='" . $c1 . "' style='background-color: " . $c1 . ";'>";
												echo "<td align='left'>" . $myrow['results'] ."</td>";;
												echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
												echo "<td align='left'>" . $myrow['fname'] . "</td>";
												echo "<td align='left'>" . $myrow['mi'] . "</td>";
												echo "<td align='left'>" . $myrow['lname'] . "</td>";
												echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
											}
											else
											{
												echo "<tr align='center' bgcolor='" . $c2 . "' style='background-color: " . $c2 . ";'>";
												echo "<td align='left'>" . $myrow['results'] ."</td>";
												echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
												echo "<td align='left'>" . $myrow['fname'] . "</td>";
												echo "<td align='left'>" . $myrow['mi'] . "</td>";
												echo "<td align='left'>" . $myrow['lname'] . "</td>";
												echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
											}
											$tcnt--;
          								
				
										}
									
										mysql_free_result($results);
										mysql_close($db);
										
										?>
										</td>
			</tr>
		</table>
                        </form>
										<input type="button" value="Print Results" onclick="printpage()"/>	
</body>
</html>
