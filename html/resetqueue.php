<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
	
	if(isset($_GET['catOrder'])) { 
		$selected=$_GET['catOrder']; 
	} else if(isset($_POST['catOrder'])) {
		$selected=$_POST['catOrder']; 
	} else {
		$selected = 0;
	}
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
                                                <a href="listcon.php"><font face="arial" size="3">Search Events</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href="manorder.php"><font face="arial" size="3">Sort Event Manually</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="eventorder.php"><font face="arial" size="3">Sort Event Automatically</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href="nextup.php"><font face="arial" size="3">On Stage Management</font></a>&nbsp;&nbsp;&nbsp;   
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<br />
					<form name="fcForm" method="post" action="resetqueue.php">
					<table align="center" border="0">
						<tr align="center">
							<td align="center">
								<font face="arial" size="3" color="#000000">Reset Category Queue: </font>
								<select id="catOrder" name="catOrder">
								  				<option value='0' <?php if($selected=0) echo "selected='selected'"; ?>>SELECT CATEGORY</option>
                                                                                                <option value=''>************** DAY 1 **************</option>
                                                                                                <option value='12' <?php if($selected=12) echo "selected='selected'"; ?>>Harmonica</option>
                                                                                                <option value='14' <?php if($selected=14) echo "selected='selected'"; ?>>Mandolin</option>
                                                                                                <option value='4' <?php if($selected=4) echo "selected='selected'"; ?>>Bluegrass Banjo</option>
                                                                                                <option value='9' <?php if($selected=9) echo "selected='selected'"; ?>>Dulcimer</option>
                                                                                                <option value='8' <?php if($selected=8) echo "selected='selected'"; ?>>Dobro</option>
                                                                                                <option value='17' <?php if($selected=17) echo "selected='selected'"; ?>>Old Time Singing</option>
                                                                                                <option value=''>************** DAY 2 **************</option>
                                                                                                <option value='1' <?php if($selected=1) echo "selected='selected'"; ?>>Beginning Fiddler (Age 10 & under)</option>
                                                                                                <option value='2' <?php if($selected=2) echo "selected='selected'"; ?>>Beginning Fiddler (Age 11-15)</option>
                                                                                                <option value='10' <?php if($selected=10) echo "selected='selected'"; ?>>Guitar-Finger</option>
                                                                                                <option value='18' <?php if($selected=18) echo "selected='selected'"; ?>>Senior Fiddler</option>
                                                                                                <option value='16' <?php if($selected=16) echo "selected='selected'"; ?>>Old Time Banjo</option>
                                                                                                <option value='7' <?php if($selected=7) echo "selected='selected'"; ?>>Classic Old Time Banjo</option>
                                                                                                <option value='11' <?php if($selected=11) echo "selected='selected'"; ?>>Guitar-Flat Picking</option>
                                                                                                <option value='3' <?php if($selected=3) echo "selected='selected'"; ?>>Bluegrass Band</option>
                                                                                                <option value='13' <?php if($selected=13) echo "selected='selected'"; ?>>Junior Fiddler</option>
                                                                                                <option value='15' <?php if($selected=15) echo "selected='selected'"; ?>>Old Time Band</option>
                                                                                                <option value='5' <?php if($selected=5) echo "selected='selected'"; ?>>Buck Dancing (Age 15 & under)</option>
                                                                                                <option value='6' <?php if($selected=6) echo "selected='selected'"; ?>>Buck Dancing (Age 16 & older)</option>
								</select>
								</td>
						</tr>
						<tr align="center">
							<td align="center">
								<br />
								<br />
						<?php
								echo "<h3>Warning: Resetting a Qeueue will reset all contestants, whether they have been onstage or not. This can not be undone!</h3>";								
								mysql_query("UPDATE events SET on_stage='2' WHERE on_stage ='0' AND category_id = '$selected'");

						?>
						<input type="submit" value="Reset Queue" />
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
