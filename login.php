<?php
	include("./includes/dbconfig.php");
	include("dbconnect.php");
	session_start();
	if(isset($_SESSION['user']))	{
		$utext = $_SESSION['user'];
		
		$query = mysql_query("SELECT username FROM $tbl_name WHERE username='$utext'")
		or die(mysql_error());
		
		if(mysql_num_rows($query) == 1)	{
			session_regenerate_id();
			header("Location: index.php");
		}
	} else {
	
?>

<html>
	<head>
		<title>ASU - Fiddlers Convention Login Form</title>
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
					<br />
					<br />
					<img src="./images/header.jpg" />
					<br />
					<br />
				</td>
			</tr>
			<tr>
			  <td STYLE="text-align: center; color: red;">
			     <?php
			      if(isset($_GET['badlogin'])) {
				echo "The username and/or password you entered is incorrect.";
			      }
			      if(isset($_GET['notlogged'])) {
				echo "You have been redirected because you are not logged in.";
			      }
			      if(isset($_GET['loggedout'])) {
				echo "You have been successfully logged out.";
			      }
			    ?>
			  </td>
			</tr>
			<tr align="center">
				<td align="center">
					<p align="center"><font face="arial" size="3" color="#000000"><b>Login Form</b></font></p>
					<br />
					<form id="formlogin" name="formlogin" action="./checklogin.php" method="post">
					<table align="center" border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
						<tr align="center">
							<td align="right">
								<font face="arial" size="3" color="#000000">Username:</font>
							</td>
							<td align="left">
								<input type="text" id="utext" name="utext" />
							</td>
						</tr>
						<tr align="center">
							<td align="right">
								<font face="arial" size="3" color="#000000">Password:</font>
							</td>
							<td align="left">
								<input type="password" id="ptext" name="ptext" />
							</td>
						</tr>
						<tr align="center">
							<td align="center" colspan="2">
								<input type="submit" name="btnLogin" value="Login" />
							</td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
		</table>	
	</body>
</html>
<?php } ?>
