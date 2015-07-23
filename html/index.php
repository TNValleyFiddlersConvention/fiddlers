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
			<?php if(isset($_GET['adminonly'])) { ?>
			<tr align="center" style="color: red;">
			  <td>
			    You must be signed in as admin to access that area.
			  </td>
			</tr>
			<?php } ?>
			<tr align="center">
				<td align="center">
					<br />
					<br />
					<img src="./images/header.jpg" />
					<br />
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<table align="center" border="0">
						<tr align="center">
							<td align="center">
								<a href="searchcomp.php"><img src="./images/search_add_contestant.png" style="border-style: none;" /></a>
							</td>
						</tr>
						<tr align="center">
							<td align="center">
								<a href="newevent.php"><img src="./images/add_event.png" style="border-style: none;" /></a>
							</td>
						</tr>
						<tr align="center">
							<td align="center">
								<a href="listcon.php"><img src="./images/list_contestants_by_event.png" style="border-style: none;" /></a>
							</td>
						</tr>
						<tr align="center">
							<td align="center">
								<a href="logout.php"><img src="./images/logout.png" style="border-style: none;" /></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php
		//	}
		?>
	</body>
</html>
