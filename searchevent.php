<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
?>

<html>
<head>
	<title>ASU - Fiddlers Convention Events Search</title>
	<link rel="stylesheet" href="./css/main.css" type="text/css" media="screen">
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
				<td align="center" class="noprint">
					<br />
						<a href="searchcomp.php"><font face="arial" size="3">Search Competitors</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="searchevent.php"><font face="arial" size="3">Search Events</font></a>
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<br />
					<form name="fcForm" method="post" action="searchevent.php">
					<table align="center" border="0">
						<tr align="center">
							<td align="center">
								<font face="arial" size="3" color="#000000">Category Search: </font>
									<?php
										echo "<select name='ddlCatList' onchange='document.fcForm.submit();'>";
										if (isset($_POST['ddlCatList']))
										{
											if ( $_POST['ddlCatList'] == "1" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1' selected='selected'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";
											}
											if ( $_POST['ddlCatList'] == "2" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2' selected='selected'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "3" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3' selected='selected'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "4" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4' selected='selected'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "5" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5' selected='selected'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "6" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6' selected='selected'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "7" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7' selected='selected'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "8" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8' selected='selected'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "9" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9' selected='selected'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "10" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10' selected='selected'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "11" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1' selected='selected'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11' selected='selected'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "12" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12' selected='selected'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "13" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13' selected='selected'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "14" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14' selected='selected'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "15" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15' selected='selected'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "16" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16' selected='selected'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "17" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17' selected='selected'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
											if ( $_POST['ddlCatList'] == "18" )
											{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18' selected='selected'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

											}
										}
										else
										{
												echo "<option value='0'>SELECT CATEGORY</option>";
												echo "<option value=''>************** DAY 1 **************</option>";
												echo "<option value='12'>Harmonica</option>";
												echo "<option value='14'>Mandolin</option>";
												echo "<option value='4'>Bluegrass Banjo</option>";
												echo "<option value='9'>Dulcimer</option>";
												echo "<option value='8'>Dobro</option>";
												echo "<option value='17'>Old Time Singing</option>";
												echo "<option value=''>************** DAY 2 **************</option>";
												echo "<option value='1'>Beginning Fiddler (Age 10 & under)</option>";
												echo "<option value='2'>Beginning Fiddler (Age 11-15)</option>";
												echo "<option value='10'>Guitar-Finger</option>";
												echo "<option value='18'>Senior Fiddler</option>";
												echo "<option value='16'>Old Time Banjo</option>";
												echo "<option value='7'>Classic Old Time Banjo</option>";
												echo "<option value='11'>Guitar-Flat Picking</option>";
												echo "<option value='3'>Bluegrass Band</option>";
												echo "<option value='13'>Junior Fiddler</option>";
												echo "<option value='15'>Old Time Band</option>";
												echo "<option value='5'>Buck Dancing (Age 15 & under)</option>";
												echo "<option value='6'>Buck Dancing (Age 16 & older)</option>";

										}
										echo "</select>";
									?>
							</td>
						</tr>
						<tr align="center">
							<td align="center">
								<br />
								<br />
								<table align="center" bgcolor="#FFFFDD" border="1" style="font-family: arial; color: #000000; border-collapse: collapse;">
								<?php
									// Do the SQL query of contestants per category selected from the dropdown list box
									// Return a new results table each time the dropdown list selection is updated


									// Get the Category Dropdown List Value
									//$ddlCL = isset($_POST['ddlCatList']) ? asi($_POST['ddlCatList']) :"";
									if ( isset($_POST['ddlCatList']) )
									{
										echo "<tr align='center'>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Contestant #</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>First Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>M.I.</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Last Name</b></font></td>";
										echo "<td align='center'><font face='arial' size='3' color='navy'><b>Age</b></font></td>";
										echo "</tr>";

										$query = "SELECT events.contestant_id, contestants.contestant_no, contestants.fname, contestants.mi, contestants.lname, contestants.age FROM events INNER JOIN contestants ON contestants.contestant_no=events.contestant_id WHERE events.category_id = '" . $_POST['ddlCatList'] . "' ORDER BY contestants.contestant_no";
										//$query = "SELECT events.contestant_id, contestants.name, contestants.age FROM events INNER JOIN contestants ON contestants.contestant_id=events.contestant_id WHERE events.category_id = '" . $_POST['ddlCatList'] . "' ORDER BY contestants.name";
										//$query = "SELECT contestant_no, name, eliminations_position FROM contestants";

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
										//$c1 = "#BFBFBF";
										//$c2 = "#DDDDDD";
										while ( $myrow = mysql_fetch_assoc($results))
										{
											if ( $tcnt % 2 == 0 )
											{
												echo "<tr align='center' bgcolor='" . $c1 . "' style='background-color: " . $c1 . ";'>";
												echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
												echo "<td align='left'>" . $myrow['fname'] . "</td>";
												echo "<td align='left'>" . $myrow['mi'] . "</td>";
												echo "<td align='left'>" . $myrow['lname'] . "</td>";
												echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
											}
											else
											{
												echo "<tr align='center' bgcolor='" . $c2 . "' style='background-color: " . $c2 . ";'>";
												echo "<td align='left'>" . $myrow['contestant_no'] . "</td>";
												echo "<td align='left'>" . $myrow['fname'] . "</td>";
												echo "<td align='left'>" . $myrow['mi'] . "</td>";
												echo "<td align='left'>" . $myrow['lname'] . "</td>";
												echo "<td align='center'>" . $myrow['age'] . "</td></tr>";
											}
											$tcnt--;
										}
										mysql_free_result($results);
										mysql_close();
									}
								?>

								</table>
							</td>
						</tr>
						<tr align="center">
								<td align="center" class="noprint">
									<br />
									<!-- GO TO regsubmit.php -->
									<input type="submit" value="Print Results" onclick="printpage()" />
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
