<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
	if($_SESSION['privs'] != 2) header("Location: ./index.php?adminonly");
?>
<script>
function requireFields() {

    var x=document.forms["useradd"]["password1"].value;
    var y=document.forms["useradd"]["password2"].value;
    var z=document.forms["useradd"]["username"].value;
    if (x==null || x=="" || y==null || y=="" || z==null || z=="") {
      alert("Please complete all fields.");
    return false;
    }
    
    if (x != y) {
      alert("Passwords do not match.");
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
								Create New User
							</td>
						</tr>
						<?php
						if(isset($_POST['username']) && isset($_POST['password1'])) {
							$user = $_POST['username'];
							$pass = $_POST['password1'];
							$results = mysql_query("SELECT username FROM users WHERE username='$user'");
							$numrows = mysql_num_rows($results);
							if($numrows == 0) {
								if(isset($_POST['adminpriv'])) {
								  $privs = 2;
								} else {
								  $privs = 1;
								}
								mysql_query("INSERT INTO users (username,password,privs) VALUES ('$user','$pass',$privs)")
								or die(mysql_error());
						?>
						<tr>
							<td colspan="2" align="center" style="font-size: 125%;">
								 <br />
								 <p style="color: red;">User <?php echo $user; ?> created.</p>
								 <br />
							</td>
						</tr>
						<?php	} else { ?>
						<tr>
							<td colspan="2" align="center" style="font-size: 125%;">
								 <br />
								 <p style="color: red;">User <?php echo $user; ?> already exists.</p>
								 <br />
							</td>
						</tr>
							<?php }
						} else {
						?>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" name="useradd" onsubmit="return requireFields()" />
						<tr>
							<td>
								Username: 
								<input type="text" size="15" name="username" />
							</td>
							<td align="right">
								Password: 
								<input type="password" size="15" name="password1" />
							</td>
						</tr>
						<tr>
							<td>
								Admin:  &nbsp;&nbsp;&nbsp;
								<input type="checkbox" size="15" name="adminpriv" />
							</td>
							<td align="right">
								Retype Password: 
								<input type="password" size="15" name="password2" />
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
							      <input type="submit" value="Add User" />
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
