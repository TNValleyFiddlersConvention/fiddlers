<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
	if(isset($_POST['cancelRem']) && isset($_POST['connum'])) {
		header("Location: ./editevent.php?contestant_no=" . $_POST['connum']);
	} else if(isset($_POST['cancelEdit'])) {
		header("Location: ./editevent.php?contestant_no=" . $_POST['connum']);
	} else if(isset($_POST['update'])) {
			if(str_replace('"','',$_POST['category'])+0 == 0) { 
				header("Location: ./editevent.php?contestant_no=" . $_POST['connum'] . "&noevent="); 
			} else {
			  mysql_query("	UPDATE events SET category_id=" . $_POST['category'] . ", elimination_tune1='" . mysql_real_escape_string($_POST['txtElimTune1']) . "', elimination_tune2='" . mysql_real_escape_string($_POST['txtElimTune2']) . "', elimination_tune3='" . mysql_real_escape_string($_POST['txtElimTune3']) . "',
					  final_tune1='" . mysql_real_escape_string($_POST['txtFinalsTune1']) . "', final_tune2='" . mysql_real_escape_string($_POST['txtFinalsTune2']) . "', final_tune3='" . mysql_real_escape_string($_POST['txtFinalsTune3']) . "',
					  eliminations_position=" . $_POST['txtPosNumElim'] . ", finals_position=" . $_POST['txtPosNumFin'] . " WHERE registration_id=" . $_POST['reg_id'])
			  or die(mysql_error());
			  for($i=1;$i<7;$i++) {
				  if(isset($_POST['filledMember' . $i])) {
					  if($_POST['txtBandMember' . $i] == NULL || $_POST['txtBandMember' . $i] == "") {
						  mysql_query("DELETE FROM members WHERE member_id=" . $_POST['filledMember' . $i]) or die(mysql_error());
					  } else {
						  mysql_query("UPDATE members SET name='" . mysql_real_escape_string($_POST['txtBandMember' . $i]) . "', instrument_id=" . $_POST['instrument' . $i] . " WHERE member_id=" . $_POST['filledMember' . $i])
						  or die(mysql_error());
					  }
				  } else {
					  if($_POST['txtBandMember' . $i] != NULL && $_POST['txtBandMember' . $i] != "") {
					  mysql_query("INSERT INTO members (contestant_id, registration_id, name, instrument_id) VALUES (" . $_POST['connum'] . ", " . $_POST['reg_id'] . ", '" . mysql_real_escape_string($_POST['txtBandMember' . $i]) . "', " . $_POST['instrument' . $i] . ")") 
					  or die(mysql_error());
				  }
			  }
			}
		}
		header("Location: ./editevent.php?contestant_no=" . $_POST['connum'] . "&updated=");
	}
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
			<?php
			if(isset($_GET['contestant_no'])) {
			      $connum = $_GET['contestant_no'];
			      $con_result = mysql_query("SELECT fname,mi,lname FROM contestants WHERE contestant_no=$connum") or die(mysql_error());
			      if(mysql_num_rows($con_result) == 1) {
				    $row = mysql_fetch_array($con_result);
				    ?>
				    <tr>
				    <td align="center">
				    <?php 
					  if(isset($_GET['updated'])){ echo "<br /><span style='color: green;'>Contestant Event info has been updated.</span><br /><br />"; } 
					  if(isset($_GET['already'])){ echo "<br /><span style='color: red;'>Contestant is already registered for that event.</span><br /><br />"; } 
					  if(isset($_GET['added'])){ echo "<br /><span style='color: green;'>Contestant has been successfully registered for event.</span><br /><br />"; } 
					  if(isset($_GET['noevent'])){ echo "<br /><span style='color: red;'>Update failed because no Event Category was selected.</span><br /><br />"; } 
					  if(isset($_GET['noeventadd'])){ echo "<br /><span style='color: red;'>Contestant was not added to event because no event was selected.</span><br /><br />"; } 
				    ?>
				    <table align="center" cellpadding="5" cellspacing="0" border="1" style="border-collapse: collapse;" width="800px">
					  <tr>
						<td style="text-align: left; font-size: 125%; color: black; padding: 10px;" colspan="6">
						      <?php
							    echo "<b>" . $connum . " - " . $row['fname'] . " " . $row['mi'] . " " . $row['lname'] . "</b> is registered for the following events: ";
						      ?>
						</td>
					  </tr>
					  <?php
						$ev_result = mysql_query("SELECT * FROM events WHERE contestant_id=$connum") or die(mysql_error());
						$rcnt = 0;
						if(mysql_num_rows($ev_result) > 0) {
							echo "<tr style='background-color: white;'><td align='center'><font face='arial' size='3' color='navy'><b>Event</b></font></td>";
							echo "<td align='center'><font face='arial' size='3' color='navy'><b>1st Tune</b></font></td>";
							echo "<td align='center'><font face='arial' size='3' color='navy'><b>2nd Tune</b></font></td>";
							echo "<td align='center'><font face='arial' size='3' color='navy'><b>3rd Tune</b></font></td>";
							echo "<td align='center'><font face='arial' size='2' color='navy'><b>Edit Registration</b></font></td>";
							echo "<td align='center'><font face='arial' size='2' color='navy'><b>Remove From Event</b></font></td></tr>";
							while($row = mysql_fetch_array($ev_result)) {
							    if($rcnt % 2 == 0) 	{
							      echo "<tr bgcolor='" . $c2 . "' style='background-color: " . $c2 . ";'>";
							    } else {
							      echo "<tr bgcolor='" . $c1 . "' style='background-color: " . $c1 . ";'>";
							    }
							    ?>
								  <td width='26%' style="text-align: left; color: black; padding: 10px;">
									<?php 
									  $id = $row['category_id'];
									  $cat_result = mysql_query("SELECT category_name FROM categories WHERE category_id=$id") or die(mysql_error());
									  $crow = mysql_fetch_array($cat_result);
									  echo "<b>" . $crow['category_name'] . "</b>"; 
									?>
								  </td>
								  <td width='16%' style="text-align: left; color: black; padding: 5px; font-size: 80%;">
									  <?php echo $row['elimination_tune1']; ?>
								  </td>
								  <td width='16%' style="text-align: left; color: black; padding: 5px; font-size: 80%;">
									  <?php echo $row['elimination_tune2']; ?>
								  </td>
								  <td width='16%' style="text-align: left; color: black; padding: 5px; font-size: 80%;">
									  <?php echo $row['elimination_tune3']; ?>
								  </td>
								  <td align='center' width='13%'><a href='editevent.php?edit_id="<?php echo $row['registration_id']; ?>"'>Edit</a></td>
								  <td align='center' width='13%'><a href='editevent.php?remove_id="<?php echo $row['registration_id']; ?>"'>Remove</a></td>
							    </tr>
					<?php 		}
						  $rcnt++;
						} ?>
				    </table><br />
				    </td>
				    </tr>
			<?php }
			} else if(isset($_GET['remove_id']) && !isset($_POST['confrem'])) { ?>
				<tr>
					<td style="text-align: center; color: black;">
					<?php
						$id = $_GET['remove_id'];
						$result = mysql_query("SELECT contestants.contestant_no AS connum,
									      contestants.fname AS first,
									      contestants.lname AS last,
									      categories.category_name AS cat
									      FROM events 
									      JOIN contestants ON contestants.contestant_no=events.contestant_id
									      JOIN categories ON categories.category_id=events.category_id
									      WHERE registration_id=$id
									      LIMIT 1") or die(mysql_error());
						if (mysql_num_rows($result) == 1) {
							$row = mysql_fetch_array($result);
							echo "<br /><br />Are you sure you want to remove <b>" . $row['first'] . " " . $row['last'] . "</b> from <b>" . $row['cat'] . "</b>?<br /><b>This action is irreversible.</b><br /><br />";
							?>
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" />
								<input type="hidden" name="connum" value="<?php echo $row['connum']; ?>" />
								<input type="submit" value="Cancel" name="cancelRem" />
								<?php echo "<input type='hidden' name='remove_id' value='" . $id . "' />" ?>
								<input type="hidden" name="cat" value="<?php echo $row['cat']; ?>" />
								<input type="submit" name="confrem" value="Confirm" />
							</form>
								     <?php } else {
									    echo "CONTESTANT REMOVAL ERROR!";
								      }
								?>
							</td>
						</tr>
		<?php	} else if(isset($_POST['remove_id']) && isset($_POST['confrem']) && isset($_POST['connum']) && isset($_POST['cat'])) { ?>
				<tr>
					<td style="text-align: center; color: black;">
					<?php
						$id = $_POST['remove_id'];
						mysql_query("DELETE FROM events WHERE registration_id=$id") or die(mysql_error());
						mysql_query("DELETE FROM members WHERE registration_id=$id") or die(mysql_error());
						$connum = $_POST['connum'];
						$result = mysql_query("SELECT fname,lname FROM contestants WHERE contestant_no=$connum") or die(mysql_error());
						if(mysql_num_rows($result)==1) {
							$row = mysql_fetch_array($result);
							echo "<br /><br /><b>" . $row['fname'] . " " . $row['lname'] . "</b> and all associated band members have been removed from <b>" . $_POST['cat'] . "</b>?<br /><b>This action is irreversible.</b><br /><br />";
							?>
							<form method="get" action="<?php echo $_SERVER['PHP_SELF']?>" />
								<input type="hidden" name="contestant_no" value="<?php echo $_POST['connum']; ?>" />
								<input type="submit" name="OK" value="OK" />
							</form>
							<?php
						} else {
							echo "CONTESTANT REMOVAL ERROR!";
						}
				?>	</td>
				</tr>
		<?php	
			} else if(isset($_GET['edit_id'])) { 
				$id = str_replace('"','',$_GET['edit_id'])+0; //remove "" and cast to int
				$result = mysql_query("SELECT 
					contestants.contestant_no AS connum,
					contestants.fname AS first,
					contestants.lname AS last,
					categories.category_id AS catid,
					categories.category_name AS cat,
					elimination_tune1,
					elimination_tune2,
					elimination_tune3,
					final_tune1,
					final_tune2,
					final_tune3,
					eliminations_position,
					finals_position
					FROM events 
					JOIN contestants ON contestants.contestant_no=events.contestant_id
					JOIN categories ON categories.category_id=events.category_id
					WHERE registration_id=$id
					LIMIT 1") or die(mysql_error());
				$row = mysql_fetch_array($result);
			?>
			  <tr align="center">
				  <td align="center">
					  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
						  <table align="center" cellpadding="5" cellspacing="0" border="1" style="border-collapse: collapse;" width="825">
							  <tr align="center">
								  <td align="center" colspan="4">
									  <font face="arial" size="4" color="black"><b>Category (Event) Info:</b></font>
								  </td>
							  </tr>
							  <tr align="center">
								  <td colspan="2" align="left">
									   <font face="arial" size="3" color="#000000">Contestant#&nbsp;&nbsp;/&nbsp;&nbsp;Name: &nbsp;&nbsp;&nbsp;<b><?php echo $row['connum'] . "&nbsp;&nbsp;/&nbsp;&nbsp;" . $row['first'] . " " . $row['last']; ?></b></font>
								  </td>
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Category:</font>
									  <font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <!-- <input type="text" id="txtCategory" /> -->
									  <select name="category">
										  <option value="0"> - SELECT AN EVENT - </option>
										  <option value="1" <?php if($row['catid']==1) { echo 'selected="selected"'; } ?>>Beginning Fiddler (Age 10 & under)</option>
										  <option value="2" <?php if($row['catid']==2) { echo 'selected="selected"'; } ?>>Beginning Fiddler (Age 11-15)</option>
										  <option value="3" <?php if($row['catid']==3) { echo 'selected="selected"'; } ?>>Bluegrass Band</option>
										  <option value="4" <?php if($row['catid']==4) { echo 'selected="selected"'; } ?>>Bluegrass Banjo</option>
										  <option value="5" <?php if($row['catid']==5) { echo 'selected="selected"'; } ?>>Buck Dancing (Age 15 & under)</option>
										  <option value="6" <?php if($row['catid']==6) { echo 'selected="selected"'; } ?>>Buck Dancing (Age 16 & older)</option>
										  <option value="7" <?php if($row['catid']==7) { echo 'selected="selected"'; } ?>>Classic Old Time Banjo</option>
										  <option value="8" <?php if($row['catid']==8) { echo 'selected="selected"'; } ?>>Dobro</option>
										  <option value="9" <?php if($row['catid']==9) { echo 'selected="selected"'; } ?>>Dulcimer</option>
										  <option value="10" <?php if($row['catid']==10) { echo 'selected="selected"'; } ?>>Guitar-Finger</option>
										  <option value="11" <?php if($row['catid']==11) { echo 'selected="selected"'; } ?>>Guitar-Flat Picking</option>
										  <option value="12" <?php if($row['catid']==12) { echo 'selected="selected"'; } ?>>Harmonica</option>
										  <option value="13" <?php if($row['catid']==13) { echo 'selected="selected"'; } ?>>Junior Fiddler</option>
										  <option value="14" <?php if($row['catid']==14) { echo 'selected="selected"'; } ?>>Mandolin</option>
										  <option value="15" <?php if($row['catid']==15) { echo 'selected="selected"'; } ?>>Old Time Band</option>
										  <option value="16" <?php if($row['catid']==16) { echo 'selected="selected"'; } ?>>Old Time Banjo</option>
										  <option value="17" <?php if($row['catid']==17) { echo 'selected="selected"'; } ?>>Old Time Singing</option>
										  <option value="18" <?php if($row['catid']==18) { echo 'selected="selected"'; } ?>>Senior Fiddler</option>
									  </select>
								  </td>
							  </tr>
							  <tr align="center">
								  <td align="center" colspan="4">
									  <font face="arial" size="4" color="black"><b>Band Member Info:</b></font>
								  </td>
							  </tr>
							  <?php
								$memquery = mysql_query("SELECT * FROM members WHERE registration_id=$id ORDER BY member_id") or die(mysql_error());
								$memcnt = mysql_num_rows($memquery);
								$cnt = 1;
								while($mrow=mysql_fetch_array($memquery)) {
								      if($cnt > 6) break;
							  ?>
								      <tr align="center">
									      <td align="left">
										      <font face="arial" size="3" color="#000000">Accompaniment/Band Member <?php echo $cnt; ?>:</font>&nbsp;&nbsp;
									      </td>
									      <td align="left">
										      <?php
										      echo "<input type='hidden' name='filledMember" . $cnt . "' value='" . $mrow['member_id'] . "' />"; ?>
										      <input type="text" name="txtBandMember<?php echo $cnt; ?>" value="<?php echo $mrow['name']; ?>" />
									      </td>
									      <td align="left">
										      <font face="arial" size="3" color="#000000">Instrument:</font>&nbsp;&nbsp;
									      </td>
									      <td align="left">
										      <!-- <input type="text" id="txtBandInstrument1" /> -->
										      <select name="instrument<?php echo $cnt; ?>" size="1">
											      <option value="0">SELECT INSTRUMENT</option>
											      <option value="1" <?php if($mrow['instrument_id']==1) { echo 'selected="selected"'; } ?>>Banjo</option>
											      <option value="2" <?php if($mrow['instrument_id']==2) { echo 'selected="selected"'; } ?>>Bass</option>
											      <option value="3" <?php if($mrow['instrument_id']==3) { echo 'selected="selected"'; } ?>>Dobro</option>
											      <option value="4" <?php if($mrow['instrument_id']==4) { echo 'selected="selected"'; } ?>>Dulcimer</option>
											      <option value="5" <?php if($mrow['instrument_id']==5) { echo 'selected="selected"'; } ?>>Fiddle</option>
											      <option value="6" <?php if($mrow['instrument_id']==6) { echo 'selected="selected"'; } ?>>Guitar</option>
											      <option value="7" <?php if($mrow['instrument_id']==7) { echo 'selected="selected"'; } ?>>Harmonica</option>
											      <option value="8" <?php if($mrow['instrument_id']==8) { echo 'selected="selected"'; } ?>>Mandolin</option>
											      <option value="9" <?php if($mrow['instrument_id']==9) { echo 'selected="selected"'; } ?>>Violin</option>
											      <option value="10" <?php if($mrow['instrument_id']==10) { echo 'selected="selected"'; } ?>>Other</option>
										      </select>
									      </td>
								      </tr>
							  <?php 
								$cnt++;
							  } 
							  while($cnt<7) {
							  ?>
							  <tr align="center">
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Accompaniment/Band Member <?php echo $cnt; ?>:</font>&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <input type="text" name="txtBandMember<?php echo $cnt; ?>" />
								  </td>
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Instrument:</font>&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <select name="instrument<?php echo $cnt; ?>" size="1">
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
							  <?php
								$cnt++;
							  }
							  ?>
							  <tr align="center">
								  <td align="center" colspan="4">
									  <font face="arial" size="4" color="black"><b>Tune Info:</b></font>
								  </td>
							  </tr>
							  <tr align="center">
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Eliminations Tune 1:</font>
									  <font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <input type="text" name="txtElimTune1" value="<?php echo $row['elimination_tune1']; ?>" />
								  </td>
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Finals Tune 1:</font>&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <input type="text" name="txtFinalsTune1" value="<?php echo $row['final_tune1']; ?>" />
								  </td>
							  </tr>
							  <tr align="center">
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Eliminations Tune 2:</font>
									  <font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <input type="text" name="txtElimTune2" value="<?php echo $row['elimination_tune2']; ?>" />
								  </td>
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Finals Tune 2:</font>&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <input type="text" name="txtFinalsTune2" value="<?php echo $row['final_tune2']; ?>" />
								  </td>
							  </tr>
							  <tr align="center">
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Eliminations Tune 3:</font>
									  <font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <input type="text" name="txtElimTune3" value="<?php echo $row['elimination_tune3']; ?>" />
								  </td>
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Finals Tune 3:</font>&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <input type="text" name="txtFinalsTune3" value="<?php echo $row['final_tune3']; ?>" />
								  </td>
							  </tr>
							  <tr align="center">
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Position # (Eliminations):</font>&nbsp;&nbsp;
								  </td>
								  <td align="left">
									  <input type='text' name='txtPosNumElim'   value='<?php echo $row['eliminations_position']; ?>' />
								  </td>
								  <td align="left">
									  <font face="arial" size="3" color="#000000">Position # (Finals):</font>&nbsp;&nbsp;
								  </td>
								  <td align="left">
										  <input type='text' name='txtPosNumFin' value='<?php echo $row['finals_position']; ?>' />
								  </td>
							  </tr>
							  <tr align="center">
								  <td align="center" colspan="4">
									 <input type="hidden" name="connum" value="<?php echo $row['connum']; ?>" />
									 <input type="hidden" name="reg_id" value="<?php echo $id; ?>" />
									 <input type="submit" value="Cancel" name="cancelEdit" />
									  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  <!-- GO TO regsubmit.php -->
									  <input type="submit" name="update" value="Update" />
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