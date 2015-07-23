<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
	if($_SESSION['privs'] != 2) header("Location: ./index.php?adminonly");
?>
<script>
function requireFields() {

    var x=document.forms["useradd"]["password1"].value;
    if (x==null || x=="") {
      alert("Please enter a username to delete.");
    return false;
    }
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
			<tr>
				<td align="center">
					<table style="color: black; padding: 5px; border-collapse: collapse;" border="1" width="600">
						<tr>
							<td colspan="2" align="center" style="font-size: 180%;">
								Delete User
							</td>
						</tr>
						<?php
						if(isset($_POST['username'])) {
							$user = $_POST['username'];
							$results = mysql_query("SELECT username FROM users WHERE username='$user'");
							$numrows = mysql_num_rows($results);
							if($numrows > 0) {
								mysql_query("DELETE FROM users WHERE username='$user'")
								or die(mysql_error());
						?>
						<tr>
							<td colspan="2" align="center" style="font-size: 125%;">
								 <br />
								 <p style="color: red;">User <?php echo $user; ?> has been deleted.</p>
								 <br />
							</td>
						</tr>
						<?php	} else { ?>
						<tr>
							<td colspan="2" align="center" style="font-size: 125%;">
								 <br />
								 <p style="color: red;">User <?php echo $user; ?> does not exist.</p>
								 <br />
							</td>
						</tr>
							<?php }
						} else {
						?>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" name="useradd" onsubmit="return requireFields()" />
						<tr>
							<td colspan="2" align="center">
							      Enter the username you wish to delete.
							      <table border="0">
							      <tr>
								<td align="right">
									<input type="text" size="15" name="username" />
								</td>
								<td align="left">
									<input type="submit" value="Delete" />
								</td>
							      </tr>
							      </table>
							</td>
						</tr>
						</form>
						<?php } ?>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
