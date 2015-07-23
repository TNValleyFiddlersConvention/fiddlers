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
					<form name="fcForm" method="post" action="searchreg.php">
					<table align="center" border="0">
						<tr align="center">
							<td align="center">
								<font face="arial" size="3" color="#000000">Category Search: </font>
								<select name="ddlCatList" onchange="document.fcForm.submit();">
									<?php 
										if (isset($_POST['ddlCatList']))
										{
											if ( $_POST['ddlCatList'] == "1" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1' selected='selected'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";												
											}
											if ( $_POST['ddlCatList'] == "2" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2' selected='selected'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "3" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3' selected='selected'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "4" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4' selected='selected'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "5" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5' selected='selected'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "6" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6' selected='selected'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "7" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7' selected='selected'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "8" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8' selected='selected'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "9" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9' selected='selected'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "10" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10' selected='selected'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "11" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11' selected='selected'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "12" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12' selected='selected'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "13" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13' selected='selected'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "14" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14' selected='selected'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "15" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15' selected='selected'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "16" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16' selected='selected'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "17" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17' selected='selected'>Old Time Singing</option>";
												echo "<option value='18'>Senior Fiddler</option>";
											}
											if ( $_POST['ddlCatList'] == "18" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value='18' selected='selected'>Senior Fiddler</option>";
											}
										}
										else
										{
											echo "<option value='0'>SELECT CATEGORY</option>";
											echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
											echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
											echo "<option value='3'>Bluegrass Band</option>";
											echo "<option value='4'>Bluegrass Banjo</option>";
											echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
											echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
											echo "<option value='7'>Classic Old Time Banjo</option>";
											echo "<option value='8'>Dobro</option>";
											echo "<option value='9'>Dulcimer</option>";
											echo "<option value='10'>Guitar-Finger</option>";
											echo "<option value='11'>Guitar-Flat Picking</option>";
											echo "<option value='12'>Harmonica</option>";
											echo "<option value='13'>Junior Fiddler</option>";
											echo "<option value='14'>Mandolin</option>";
											echo "<option value='15'>Old Time Band</option>";
											echo "<option value='16'>Old Time Banjo</option>";
											echo "<option value='17'>Old Time Singing</option>";
											echo "<option value='18'>Senior Fiddler</option>";		
										}
									?>
									<!-- 
									<option value="0">SELECT CATEGORY</option>
									<option value="1">Beginning Fiddler (Age 10 & under)</option>
									<option value="2">Beginning Fiddler (Age 11-15)</option>
									<option value="3">Bluegrass Band</option>
									<option value="4">Bluegrass Banjo</option>
									<option value="5">Buck Dancing (Age 15 & under)</option>
									<option value="6">Buck Dancing (Age 16 & older)</option>
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
									-->
								</select>
							</td>
						</tr>
						<tr align="center">
							<td align="center">
								<br />
								<br />
								<table align="center" width="500" bgcolor="#FFFFDD" border="1" style="font-family: arial; color: #000000; ">
								<tr align="center">
									<td align="center"><font face="arial" size="3" color="navy"><b>Contestant #</b></font></td>
									<td align="center"><font face="arial" size="3" color="navy"><b>Name</b></font></td>
									<td align="center"><font face="arial" size="3" color="navy"><b>Performance Position</b></font></td>
								</tr>
								<?php 
									// Do the SQL query of contestants per category selected from the dropdown list box
									// Return a new results table each time the dropdown list selection is updated
									//$db = pg_connect("host=$dbhost port=$dbport dbname=$dbname user=$dbuser password=$dbpswd") or die ("Unable to connect to database");
									$db = mysql_connect($host, $username, $password);
									mysql_select_db("fidcon");
									// Get the Category Dropdown List Value
									//$ddlCL = isset($_POST['ddlCatList']) ? asi($_POST['ddlCatList']) :"";
									if ( isset($_POST['ddlCatList']) )
									{
										$query = "SELECT Contestants.contestant_no, Contestants.name, Registrations.Winner_Position FROM Contestants INNER JOIN Registrations ON Contestants.Contestant_ID=Registrations.Contestant_ID WHERE Registrations.Category_ID = '" . $_POST['ddlCatList'] . "' ORDER BY Contestants.Name";
										//$query = "SELECT contestant_no, name, eliminations_position FROM contestants";
									
										$results = mysql_query($query);
										if (!$results) 
										{
											echo "Database Query Failed " . $query . "<br />";
											echo mysql_error();
											echo "FAILED";
											exit();
										}
										
										while ( $myrow = mysql_fetch_assoc($results))
										{
											//echo "<tr align='center'><td align='left'>" . $myrow['contestant_no'] . "</td><td align='left'>" . $myrow['name'] . "</td><td align='left'>" . $myrow['eliminations_position'] . "</td></tr>";
											echo "<tr align='center'><td align='left'>" . $myrow['contestant_no'] . "</td><td align='left'>" . $myrow['name'] . "</td><td align='left'>" . $myrow['winner_position'] . "</td></tr>";
										}
										mysql_free_result($results);									
										mysql_close($db);
									}
								?>
								
								</table>
							</td>
						</tr>
						<tr align="center">
								<td align="center">
									<br />
									<!-- GO TO regsubmit.php -->
									<input type="submit" value="Print Reults" />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<!-- GO TO HOME PAGE -->
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