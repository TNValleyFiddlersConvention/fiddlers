<!DOCTYPE html>
<html>

<head>

	<title>Tennessee Valley Old Time Fiddlers Convention | Winners and Events</title>
	<meta charset=utf-8">
	<meta name="description" content="Winners list of the Tennessee Valley Old Time Fiddler's
		Convention">
	<meta name="keywords" content="Tennessee Valley, Fiddler's Convention, Athens State University,
		Bluegrass Festival">
	<link rel="stylesheet" href="main.css">
	<meta http-equiv="refresh" content="5; url=dobro.php"</>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
</head>
<body>
	<header>
		<img src = "sample2.png" alt="it didn't work" height="250" width = "500">
		<h1>Tennessee Valley Old Time Fiddlers Convention Winners</h1>
	</header>
	
			<nav id="nav_bar">
			<ul>
				<li><a href="beginning_fiddler10.php">Beginning Fiddler (Age 10 & under)</a></li>
				<li><a href="beginning_fiddler11.php">Beginning Fiddler (Age 11 - 15)</a></li>
				<li><a href="bluegrass_band.php">Bluegrass Band</a></li>
				<li><a href="bluegrass_banjo.php">Bluegrass Banjo</a></li>
				<li><a href="buck_dancing15.php">Buck Dancing (Age 15 & under)</a></li>
				<li><a href="buck_dancing16.php">Buck Dancing (Age 16 & older)</a></li>
				<li><a href="classic_old_time_banjo.php" class="current">Classic Old Time Banjo</a></li>
				<li><a href="dobro.php">Dobro</a></li>
				<li><a href="dulcimer.php">Dulcimer</a></li>
				<li><a href="guitar_finger_picking.php">Guitar Finger Picking</a></li>
				<li><a href="guitar_flat_picking.php">Guitar Flat Picking</a></li>
				<li><a href="harmonica.php">Harmonica</a></li>
				<li><a href="junior_fiddler.php">Junior Fiddler</a></li>
				<li><a href="mandolin.php">Mandolin</a></li>
				<li><a href="old_time_banjo.php">Old Time Banjo</a></li>
				<li><a href="old_time_band.php">Old Time Band</a></li>
				<li><a href="old_time_singing.php">Old Time Singing</a></li>
				<li><a href="senior_fiddler.php">Senior Fiddler</a></li>
			</ul>
		</nav>
	
	<section>
		<h2>Classic Old Time Banjo</h2>
		<?php
//Make localhost your database 
$con = mysql_connect("localhost","admin","admin","TestFidCon");
if(!$con)
{
die("cannot connect: ". mysql_error());
}

mysql_select_db("TestFidCon", $con);
//Change the value events.category_id to match the desired category you want the results for
//Also alter the events.finals_place to specify which position you want
$sql = "SELECT contestants.fname, contestants.lname, events.category_id 
FROM events, contestants WHERE events.category_id = 1 AND events.contestant_id = contestants.contestant_id
AND events.finals_place = 1";
$myData = mysql_query($sql,$con);
while($record = mysql_fetch_array($myData))
{
if($record['category_id'] == 7)
{
echo "<strong>First: </strong>";
echo $record['fname'];
echo " ";
echo $record['lname'];
echo "</br>";
}
}
//Change the value events.category_id to match the desired category you want the results for
//Also alter the events.finals_place to specify which position you want
$sql = "SELECT contestants.fname, contestants.lname, events.category_id 
FROM events, contestants WHERE events.category_id = 1 AND events.contestant_id = contestants.contestant_id
AND events.finals_place = 2";
$myData = mysql_query($sql,$con);
while($record = mysql_fetch_array($myData))
{
if($record['category_id'] == 7)
{
echo "<strong>Second: </strong>";
echo $record['fname'];
echo " ";
echo $record['lname'];
echo "</br>";
}
}
//Change the value events.category_id to match the desired category you want the results for
//Also alter the events.finals_place to specify which position you want
$sql = "SELECT contestants.fname, contestants.lname, events.category_id 
FROM events, contestants WHERE events.category_id = 1 AND events.contestant_id = contestants.contestant_id
AND events.finals_place = 3";
$myData = mysql_query($sql,$con);
while($record = mysql_fetch_array($myData))
{
if($record['category_id'] == 7)
{
echo "<strong>Third: </strong>";
echo $record['fname'];
echo " ";
echo $record['lname'];
echo "</br>";
}
}

?>
		<p><br></p>
		<p><br></p>
		<p><br></p>
		<p><br></p>
		<p><br></p>
		<p><br></p>
		<p><br></p>
		<p><br></p>
		<p><br></p>
		<p><br></p>
	</section>
	</section>
	
	<footer>
		<p>&copy; Copyright 2015 Matthew Brooks, Daniel Deal, Adam Novoa, Garrett Gillott
	</footer>

</body>
</html>