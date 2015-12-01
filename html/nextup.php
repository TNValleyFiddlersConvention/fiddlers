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
					<form name="fcForm" method="get" action="onstage.php">
					<table align="center" border="0">
						<tr align="center">
							<td align="center">
								<font face="arial" size="3" color="#000000">Category Search: </font>
								<select id="catOrder" name="catOrder">
								  				<option value='0'>SELECT CATEGORY</option>
                                                                                                <option value=''>************** DAY 1 **************</option>
                                                                                                <option value='12'>Harmonica</option>
                                                                                                <option value='14'>Mandolin</option>
                                                                                                <option value='4'>Bluegrass Banjo</option>
                                                                                                <option value='9'>Dulcimer</option>
                                                                                                <option value='8'>Dobro</option>
                                                                                                <option value='17'>Old Time Singing</option>
                                                                                                <option value=''>************** DAY 2 **************</option>
                                                                                                <option value='1'>Beginning Fiddler (Age 10 & under)</option>
                                                                                                <option value='2'>Beginning Fiddler (Age 11-15)</option>
                                                                                                <option value='10'>Guitar-Finger</option>
                                                                                                <option value='18'>Senior Fiddler</option>
                                                                                                <option value='16'>Old Time Banjo</option>
                                                                                                <option value='7'>Classic Old Time Banjo</option>
                                                                                                <option value='11'>Guitar-Flat Picking</option>
                                                                                                <option value='3'>Bluegrass Band</option>
                                                                                                <option value='13'>Junior Fiddler</option>
                                                                                                <option value='15'>Old Time Band</option>
                                                                                                <option value='5'>Buck Dancing (Age 15 & under)</option>
                                                                                                <option value='6'>Buck Dancing (Age 16 & older)</option>
								</select>
								</td>
						</tr>
						<tr align="center">
							<td align="center">
								<br />
								<br />
								<table align="center" bgcolor="#FFFFDD" border="1" style="font-family: arial; color: #000000; border-collapse: collapse;">
						<input type="hidden" name="initialize" id="initialize" value="1"/>		
						<input type="hidden" name="tracker" id="initialize" value="1"/>
						<input type="submit" value="Start" />
								</table>
							</td>
						</tr>
						<tr align="center">
								<td align="center">
									<br />
									<input type="button" value="Cancel" onClick="parent.location='index.php'" />
								</td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
		</table>	
	</body>
</html>
