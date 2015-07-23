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
					<!-- IMAGES GOES HERE -->
					<br />
					<br />
					<img src="./images/header.jpg" />
					<br />
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<?php if($_SESSION['privs'] == 2) { ?>
					<table align="center" border="0">
						<tr align="center">
							<td align="center">
								<a href="manage.php"><h1>Manage Backstage</h1></a>
							</td>
						</tr>
						<tr align="center">
							<td align="center">
								<a href="judge.php"><h1>Judging</h1></a>
							</td>
						</tr>
					</table>
					<?php } else { ?>
					<table align="center" border="0">
						<tr align="center">
							<td align="center">
								<p style="color: red; font-size: 150%;">You must be logged in as an administrator to access this area.</p>
							</td>
						</tr>
					</table>
					<?php } ?>
				</td>
			</tr>
		</table>
	</body>
</html>
