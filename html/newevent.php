<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");

	
	// Grab the contestant_no from the GET method (part of the URL in the address bar)
	if (isset($_GET['contestant_no'])) { $cn = $_GET['contestant_no']; }
	
?>
<?php if(isset($_POST['submit'])) { 
				if($_POST['event_category'] != 0) { 
					$result = mysql_query("SELECT category_id FROM events WHERE category_id=" .  $_POST['event_category'] . " AND contestant_id=" . $_POST['txtContestantNum']) or die(mysql_error());
					$rownum = mysql_num_rows($result);
					$row = mysql_fetch_array($result);
					if($rownum > 0) { 
						header("Location: ./editevent.php?contestant_no=" . $_POST['txtContestantNum'] . "&already=");  
					} else {
						mysql_query("INSERT INTO events (category_id, contestant_id, elimination_tune1, elimination_tune2, elimination_tune3, final_tune1, final_tune2, final_tune3, eliminations_position, finals_position)
						VALUES (" . $_POST['event_category'] . ", " . $_POST['txtContestantNum'] . ", '" . mysql_real_escape_string($_POST['txtElimTune1']) . "', '" . mysql_real_escape_string($_POST['txtElimTune2']) . "', '" . mysql_real_escape_string($_POST['txtElimTune3']) . "',
						'" . mysql_real_escape_string($_POST['txtFinalTune1']) . "', '" . mysql_real_escape_string($_POST['txtFinalTune2']) . "', '" . mysql_real_escape_string($_POST['txtFinalTune3']) . "', '" . $_POST['txtPosNumElim'] . "', '" . $_POST['txtPosNumFinal'] . "')")
						or die(mysql_error());
						$result = mysql_query("SELECT registration_id FROM events WHERE contestant_id='" . $_POST['txtContestantNum'] . "' AND category_id=" . $_POST['event_category']) or die(mysql_error());
						$row = mysql_fetch_array($result);
						for($i = 1; $i <7; $i++) {
							if($_POST['txtBandMember' . $i] != NULL && $_POST['txtBandMember' . $i] != "") {
								mysql_query("INSERT INTO members (contestant_id, registration_id, name, instrument_id) VALUES (" . $_POST['txtContestantNum'] . ", " . $row['registration_id'] . ", '" . mysql_real_escape_string($_POST['txtBandMember' . $i]) . "', " . $_POST['instrument' . $i] . ")") 
								or die(mysql_error());
							}
						}
						header("Location: ./editevent.php?contestant_no=" . $_POST['txtContestantNum'] . "&added=" . $rownum);
					}
				} else {
					header("Location: ./editevent.php?contestant_no=" . $_POST['txtContestantNum'] . "&noeventadd=");
				}
			} else { ?>
<html>
	<head>
		<title>ASU - Fiddlers Convention Event Registration Form</title>
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
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<a href="newreg.php"><font face="arial" size="3">New Contestant</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="newevent.php"><font face="arial" size="3">New Event</font></a>
					<br />

				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<font face="arial" size="4" color="black"><b>Event Registration</b></font>
					<br /><br />
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
						<table align="center" cellpadding="5" cellspacing="5" border="1" style="padding: 5px; border-collapse: collapse;">
							<tr align="center">
								<td align="center" colspan="2">
									<font face="arial" size="3" color="#000000">Contestant #:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
									<?php
										if (isset($_GET['contestant_no'])) 
										{
											echo "<input type='text' id='txtContestantNum' name='txtContestantNum' value='" . $cn . "' />";
										}
										else
										{
											echo "<input type='text' id='txtContestantNum' name='txtContestantNum' />";
										}
									?>
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Category:</font><br />
									<font face="arial" size="2" color="#000000">(Select all that apply)</font>
								</td>
								<td align="right">
									<select name="event_category">
										<option value="0"> - SELECT AN EVENT - </option>
										<option value="1">Beginning Fiddler (Age 10 & under)</option>
										<option value="2">Beginning Fiddler (Age 11 - 15)</option>
										<option value="3">Bluegrass Band</option>
										<option value="4">Bluegrass Banjo</option>
										<option value="5">Buck Dancing (Age 15 & under)</option>
										<option value="6">Buck Dancing (Age 16 & over)</option>
										<option value="7">Classic Old Time Banjo</option>
										<option value="8">Dobro</option>
										<option value="9">Dulcimer</option>
										<option value="10">Guitar-Finger</option>
										<option value="11">Guitar-Flat Picking</option>
										<option value="12">Harmonica</option>
										<option value="13">Junior Fiddler</option>
										<option value="14">Mandolin</option>
										<option value="15">Old Time Band</option>
										<option value="16">Old Time Banjo</option>
										<option value="17">Old Time Singing</option>
										<option value="18">Senior Fiddler</option>
									</select>
								</td>
							</tr>
							<tr align="center">
								  <td align="center" colspan="4">
									  <font face="arial" size="4" color="black"><b>Band Member Info:</b></font>
								  </td>
							</tr>
							<?php
							for($i = 1; $i < 7; $i++) {
							?>
								      <tr align="center">
									      <td align="left">
										      <font face="arial" size="3" color="#000000">Accompaniment/Band Member <?php echo $i; ?>:</font>&nbsp;&nbsp;
									      </td>
									      <td align="left">
										      <input type="text" name="txtBandMember<?php echo $i; ?>" />
									      </td>
									      <td align="left">
										      <font face="arial" size="3" color="#000000">Instrument:</font>&nbsp;&nbsp;
									      </td>
									      <td align="left">
										      <!-- <input type="text" id="txtBandInstrument1" /> -->
										      <select name="instrument<?php echo $i; ?>" size="1">
											      <option value="0">SELECT INSTRUMENT</option>
											      <option value="1">Banjo</option>
											      <option value="2">Bass</option>
											      <option value="3">Dobro</option>
											      <option value="4">Dulcimer</option>
											      <option value="5">Fiddle</option>
											      <option value="6">Guitar</option>
											      <option value="7">Harmonica</option>
											      <option value="8">Mandolin</option>
											      <option value="9">Violin</option>
											      <option value="10">Other</option>
										      </select>
									      </td>
								      </tr>
							  <?php } ?>
							<tr align="center">
								  <td align="center" colspan="4">
									  <font face="arial" size="4" color="black"><b>Tune Info:</b></font>
								  </td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Position No. (Eliminations):</font>
								</td>
								<td align="left">
									<input type="text" id="txtPosNumElim" name="txtPosNumElim" />
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Position No. (Finals):</font>
								</td>
								<td align="left">
									<input type="text" id="txtPosNumFinal" name="txtPosNumFinal" />
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Eliminations Tune 1:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtElimTune1" name="txtElimTune1" />
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Finals Tune 1:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtFinalTune1" name="txtFinalTune1" />
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Eliminations Tune 2:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtElimTune2" name="txtElimTune2" />
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Finals Tune 2:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtFinalTune2" name="txtFinalTune2" />
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Eliminations Tune 3:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtElimTune3" name="txtElimTune3" />
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Finals Tune 3:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtFinalTune3" name="txtFinalTune3" />
								</td>
							</tr>
							<tr align="center">
								<td align="center" colspan="4">
									<!-- GO TO HOME PAGE -->
									<input type="button" value="Cancel" onClick="parent.location='index.php'" />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<!-- GO TO regsubmit.php -->
									<input type="submit" value="Submit" name="submit" />
								</td>
							</tr>
						</table>
					</form>	
					<p align="center">
						<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;
						<font face="arial" size="2" color="black">- Indicates a required field.</font>
					</p>
				</td>
			</tr>
			<?php } ?>
		</table>
	</body>
</html>
