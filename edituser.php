<?php
	// This file is used to edit an existing user in the database
	session_start();

	// Include the DB config file
	include("../includes/dbconfig.php");

	// Get the event year
	$yr = strval($_GET['event_year']);

	$db = mysql_connect($host, $username, $password);
	mysql_select_db("fidcon");
?>

<html>
<head>
	<title>Fiddlers Convention Mailing List CSV File Generator</title>
	<link href="http://mcs.athens.edu/fiddlers/images/favicon.ico" rel="SHORTCUT ICON" />
	<!-- <meta http-equiv="Refresh" content="10;url=http://mcs.athens.edu/fiddlers/admin" /> -->

</head>
<body bgcolor="#A0CAF9">

<?php
	$usern = "";	// Blank
	$passw = "";	// Blank
	$privies = 1;	// Default privs

	if (isset($_GET['username']))
	{
		$qry = "SELECT * FROM users WHERE username = '" . $_GET['username'] . "'";
		$res = mysql_query($qry);
		if (!$res)
		{
			echo "SQL SELECT FAILED: " . $qry;
			echo "<br /><br /> " . mysql_error();
			exit();
		}
		while( $onerow = mysql_fetch_assoc($res) )
		{
			$usern = $onerow['username'];
			$n = $onerow['name'];
			$passw = $onerow['password'];
			$privies = $onerow['privs'];
		}
	}
	else
	{
		if (isset($_POST['ddlUN']))
		{
			$qry = "SELECT * FROM users WHERE username = '" . $_POST['ddlUN'] . "'";
			$res = mysql_query($qry);
			if (!$res)
			{
				echo "SQL SELECT FAILED: " . $qry;
				echo "<br /><br /> " . mysql_error();
				exit();
			}
			while( $onerow = mysql_fetch_assoc($res) )
			{
				$usern = $onerow['username'];
				$n = $onerow['name'];
				$passw = $onerow['password'];
				$privies = $onerow['privs'];
			}
		}
	}
?>

<div id="printTable">
<p align="center">
	<font face="arial" size="4" color="navy"><b>ASU Fiddlers Convention</b></font>
</p>
<p align="center">
	<font face="arial" size="3" color="navy"><b>Edit a User</b></font>
</p>
<p align="center"><a href="index.php">Back</a></p>
<input type="hidden" id="hUN" name="hUN" value="<?php echo $_POST['ddlUN']; ?>" />
<?php
	$y = strval(date("Y"));
	if ( isset($_POST['ddlUN']) && isset($_POST['txtPW']) && isset($_POST['txtPW2']) && isset($_POST['txtName']) )
	{
			if ( $_POST['txtPW'] === $_POST['txtPW2'] )	// Test if the passwords match
			{
				if ( (intval($_POST['txtPrivs']) > 0) && (intval($_POST['txtPrivs']) < 3) ) 	// Set the boundaries of the user privileges to 1 and 2
				{
					if ( ($_POST['txtPW'] != "") && ($_POST['txtPW2'] != "") )
					{
						$q = "UPDATE users SET name = '" . $_POST['txtName'] . "', password = '" . $_POST['txtPW'] . "', privs = " . $_POST['txtPrivs'] . " WHERE username = '" . $_POST['ddlUN'] . "'";
						$r = mysql_query($q);
						if (!$r)
						{
							echo "SQL SELECT FAILED: " . $q;
							echo "<br /><br /> " . mysql_error();
						}
						else
						{
							echo "<p align='center'><font face='arial' size='3' color='green'><b>USER UPDATED SUCCESSFULLY!</b></font></p>";
						?>
						<script type="text/javascript" language="javascript">
							function updateGood()
							{
								// A function to redirect to another page
								var dun, preStr, str;
								str = "edituser.php";
								parent.location=str;
							}
							setTimeout('updateGood()', 2000);
						</script>
						<?php
						}
					}
					else
					{
						echo "<p align='center'><font face='arial' size='3' color='maroon'><b>Password is empty!<br />This is not allowed.<br />Please try again.</b></p>";
				}	}
				else
				{
					$qry = "SELECT * FROM users WHERE username = '" . $_POST['ddlUN'] . "'";
					$res = mysql_query($qry);
					if (!$res)
					{
						echo "SQL SELECT FAILED: " . $qry;
						echo "<br /><br /> " . mysql_error();
						exit();
					}
					while( $onerow = mysql_fetch_assoc($res) )
					{
						$usern = $onerow['username'];
						$n = $onerow['name'];
						$passw = $onerow['password'];
						$privies = $onerow['privs'];
					}
				}
			}
			else
			{
				echo "<p align='center'><font face='arial' size='3' color='maroon'><b>Passwords do no match!</b></p>";
			}
	}
	else	// This condition happens when we first come to the page from another page (BLANK FORM)
	{ echo ""; }
?>

<form id="euForm" name="euForm" method="post" action="edituser.php">
	<table align="center" border="1" cellspacing="5" cellpadding="5" style="border-collapse:  collapse;">
		<tr align="center">
			<td align="right">
				<font face="arial" size="3" color="#000000">Username: </font>
			</td>
			<td align="center">
				<select id="ddlUN" name="ddlUN" onChange="document.euForm.submit();">
					<option value="">Select a User</option>
				<?php
					$query = "SELECT username FROM users ORDER BY username ASC";
					$result = mysql_query($query);
					if (!$result)
					{
						echo "DB SELECT query failed on 'users' table: " . $query . "<br /><br />";
						echo mysql_error();
					}
					while ( $myrow = mysql_fetch_assoc($result) )
					{
						if ( isset($_POST['ddlUN']) && (strval($_POST['ddlUN']) === strval($myrow['username'])) )
						{
							echo "<option value='" . $myrow['username'] . "' selected='selected'>" . $myrow['username'] . "</option>";
						}
						else
						{
							if ( isset($_GET['username']) && (strval($_GET['username']) === strval($myrow['username'])) )
							{
								echo "<option value='" . $myrow['username'] . "' selected='selected'>" . $myrow['username'] . "</option>";
							}
							else
							{
								echo "<option value='" . $myrow['username'] . "'>" . $myrow['username'] . "</option>";
							}
						}
					}
				?>
				</select>
			</td>
			<td align="right">
				<font face="arial" size="3" color="#000000">Full Name: </font>
			</td>
			<td align="center">
			<?php
				if ( isset($_POST['ddlUN'] ) || isset($_GET['username']) )
				{
					echo "<input type='text' id='txtName' name='txtName' size='12' max='12' value='" . $n . "' />";
				}
				else
				{
					echo "<input type='text' id='txtName' name='txtName' size='12' max='12' />";
				}
			?>
			</td>
		</tr>
		<tr align="center">
			<td align="right">
				<font face="arial" size="3" color="#000000">Password: </font>
			</td>
			<td align="center">
			<?php
				if ( isset($_POST['ddlUN'] ) || isset($_GET['username']) )
				{
					echo "<input type='text' id='txtPW' name='txtPW' size='12' max='12' value='" . $passw . "' />";
				}
				else
				{
					echo "<input type='text' id='txtPW' name='txtPW' size='12' max='12' value='" . $_POST['txtPW'] . "' />";
				}
			?>
			</td>
			<td align="right">
				<font face="arial" size="3" color="#000000">Password: </font>
				<font face="arial" size="3" color="maroon">(Repeat): </font>
			</td>
			<td align="center">
			<?php
				if ( isset($_POST['ddlUN'] ) || isset($_GET['username']) )
				{
					echo "<input type='text' id='txtPW2' name='txtPW2' size='12' max='12' value='" . $passw . "' />";
				}
				else
				{
					echo "<input type='text' id='txtPW2' name='txtPW2' size='12' max='12' value='" . $_POST['txtPW2'] . "' />";
				}
			?>
			</td>
		</tr>
		<tr align="center">
			<td align="right">
				<font face="arial" size="3" color="#000000">Privileges: </font>
			</td>
			<td align="center">
			<?php
				if ( isset($_POST['ddlUN'] ) || isset($_GET['username']) )
				{
					echo "<input type='text' id='txtPrivs' name='txtPrivs' size='2' max='2' value='" . $privies . "' />";
				}
				else
				{
					echo "<input type='text' id='txtPrivs' name='txtPrivs' size='2' max='2' value='" . $_POST['txtPrivs'] . "' />";
				}
			?>
			</td>
			<td align="center" colspan="2">
				<input type="submit" value="Update" />
			</td>
		</tr>
	</table>
</form>
</div>

</body>
</html>
