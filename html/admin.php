<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
	if($_SESSION['privs'] != 2) header("Location: ./index.php?adminonly");
?>
<script type="text/javascript" language="javascript">
	function redirCreate()
	{
		window.location="createuser.php";
	}
	function redirEdit()
	{
		window.location="edituser.php";
	}
	function redirDelete()
	{
		window.location="deleteuser.php";
	}
	function redirPW()
	{
		window.location="userpswd.php";
	}
	function redirDelCompInfo()
	{
		window.location="delcompinfo.php";
	}
	function redirMysqlDump()
	{
		window.location="dbbackup.php";
	}
	function redirRegEventEdit()
	{
		window.location="regeventedit.php";
	}
	function redirNullify()
	{
		window.location="nullconnum.php";
	}
	function redirDelCompEvent()
	{
		window.location="delcompevent.php";
	}
</script>
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
					<table id="tblInner" name="tblInner" width="700" align="center" border="1" cellpadding="20" cellspacing="20" style="padding: 20px; border-collapse: collapse;">
						<tr align="center">
							<td align="left" bgcolor="#CCCCCC">
								<!-- <a href="logout.php"><img src="./images/logout.png" style="border-style: none;" /></a> -->
								<font face="arial" size="4" color="#000000">Create / Delete Users</font>
							</td>
						</tr>
						<tr align="center">
							<td align="left">
								<br />
								<font face="arial" size="2" color="maroon"><b>CREATE / DELETE USERS: </b></font>&nbsp;&nbsp;&nbsp;
								<input type="button" value="Create" onClick="redirCreate();" />&nbsp;&nbsp;
								<input type="button" value="Delete" onClick="redirDelete();" />
								<br />
								<br />
							</td>
						</tr>
						<tr align="center"  bgcolor="#CCCCCC">
							<td align="left">
								<font face="arial" size="4" color="#000000">Export Mailing List to CSV File</font>
							</td>
						</tr>
						<tr align="center">
							<td align="center">
								<br />
								<font face="arial" size="3" color="#000000">Year: </font>&nbsp;
								<select id="ddlYear" name="ddlYear">
								<?php

									// Export Mailing List to .csv file
									$now = date("m-d-Y");
									$y = date("Y");		// Get only the year from the full date
									$yr = intval($y); // Get the integer value of the year
									$lowend = $yr - 10;   // Go back 'x' years
									$rng = $yr - $lowend;	// Get the year range
									for ( $i=0; $i<$rng; $i++ )
									{	// Fill the year array and generate <option> tags to fille the dropdownlist
										if ($i == 0)
										{ echo "<option value='" . $yr . "'>" . $yr . "</option>"; }
										else
										{
											$yt = $yr - $i;
											echo "<option value='" . $yt . "'>" . $yt . "</option>";
										}
									}
								?>
								</select>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<script type="text/javascript" language="javascript">
									function redir()
									{
										var a = document.getElementById("ddlYear");
										window.location="gencsv.php?event_year=" + a.options[a.selectedIndex].value;
									}
								</script>
								<input type="button" onClick="redir()" value="Generate Mailing List File" />
								<br />
								<br />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
