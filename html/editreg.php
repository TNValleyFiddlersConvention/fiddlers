<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
	
	if ( isset($_GET['contestant_id']) ) { $cid = $_GET['contestant_id']; }

	// Grab the GET variable for contestant_no (from the URL in the address bar)
	if ( isset($_GET['contestant_no']) ) { $cn = $_GET['contestant_no']; }
	else if ( isset($_POST['connumsearch']) ) { $cn = $_POST['connumsearch']; }

	// Variables for later on in the page (db fields)
	if ( ! isset($_GET['contestant_id']) ) { $cid = 0; }

	// Status of the query for the confirmation message later on	0 = fail, 1 = success
	$query_status = 0;

	// Get the current date for the registration entry
	$now = date("m-d-Y");

	// Get POST variables here and do SQL SELECT
	if (isset($_POST['connumsearch']) || isset($_GET['contestant_no']))
	{
		if ( isset($cn) ) { 
		  $query = "SELECT contestant_no, fname, mi, lname, birth_date, age, phone, address, city, state, zip, email FROM contestants WHERE contestant_no = " . $cn;	
		  $results = mysql_query($query); 
		} 
		if (!isset($results))
		{
			echo "Database Query Failed " . $query . "<br />";
			echo mysql_error();
			echo "FAILED";
			exit();
		}

		while ( $myrow = mysql_fetch_assoc($results))
		{
			//$cnum = $myrow['contestant_no'];
			$cfname = $myrow['fname'];
			$cmi = $myrow['mi'];
			$clname = $myrow['lname'];
			$cdob = $myrow['birth_date'];
			$cage = $myrow['age'];
			$cphone = $myrow['phone'];
			$caddr = $myrow['address'];
			$ccity = $myrow['city'];
			$cstate = $myrow['state'];
			$czip = $myrow['zip'];
			$cemail = $myrow['email'];
		}
	}

	if (isset($_GET['contestant_no']))
	{
		$query = "SELECT fname, mi, lname, birth_date, age, phone, address, city, state, zip, email FROM contestants WHERE contestant_no = " . $_GET['contestant_no'];
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
			//$cnum = $myrow['contestant_no'];
			$cfname = $myrow['fname'];
			$cmi = $myrow['mi'];
			$clname = $myrow['lname'];
			$cdob = $myrow['birth_date'];
			$cage = $myrow['age'];
			$cphone = $myrow['phone'];
			$caddr = $myrow['address'];
			$ccity = $myrow['city'];
			$cstate = $myrow['state'];
			$czip = $myrow['zip'];
			$cemail = $myrow['email'];
		}
	}
	if ( isset($_GET['contestant_id']) )
	{
		$query = "SELECT contestant_no, fname, mi, lname, birth_date, age, phone, address, city, state, zip, email FROM contestants WHERE contestant_id = " . $_GET['contestant_id'];
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
                        //$cnum = $myrow['contestant_no'];
			$cfname = $myrow['fname'];
			$cmi = $myrow['mi'];
			$clname = $myrow['lname'];
			$cdob = $myrow['birth_date'];
                        $cage = $myrow['age'];
                        $cphone = $myrow['phone'];
                        $caddr = $myrow['address'];
                        $ccity = $myrow['city'];
                        $cstate = $myrow['state'];
                        $czip = $myrow['zip'];
                        $cemail = $myrow['email'];
                }
	}


?>

<html>
	<head>
		<title>ASU - Fiddlers Convention Registration Form</title>
		<link rel="stylesheet" href="./css/main.css" type="text/css" media="screen"></script>

		 <script type="text/javascript" language="javascript">

                        // function calculate_age(birth_month,birth_day,birth_year)
                        function calculate_age()
                        {
                            var dStr = document.getElementById('txtContestantDOB').value;
                            var birth_month = Number(dStr.substr(0,2));
                            var birth_day = Number(dStr.substr(3,2));
                            var birth_year = Number(dStr.substr(6,4));
                            var today_date = new Date();
                            var today_year = today_date.getFullYear();
                            var today_month = today_date.getMonth();
                            var today_day = today_date.getDate();
                            var age = today_year - birth_year;
                            if ( today_month < (birth_month - 1))
                            { age--; }
                            if (((birth_month - 1) == today_month) && (today_day < birth_day))
                            { age--; }
                            document.getElementById('txtAge').value = age;
                        }
                        var a = calculate_age($dStrM, $dStrD, $dStrY);
                        document.getElementById('txtAge').value = a;
                        
                        function requireFields2() {
			  var x=document.forms["ruForm"]["txtContestantNum"].value;
			  if (x==null || x=="") {
			    alert("Contestant number is required.");
			  return false;
			  }
			  
			  if (isNaN(x)) {
			    alert("Contestant number may only contain numbers.");
			  return false;
			  }
			  
			  x=document.forms["ruForm"]["txtContestantDOB"].value;
			  if (x==null || x=="") {
			    alert("Date of birth is required.");
			  return false;
			  }
			  
			  var validformat=/^\d{1,2}\/\d{1,2}\/\d{4}$/;
			  if (!validformat.test(x)) {
			    alert("Format for date of birth should be mm/dd/yyyy.");
			    return false;
			  }
			  
			  x=document.forms["ruForm"]["txtContestantFName"].value;
			  if (x==null || x=="") {
			    alert("First name is required.");
			  return false;
			  }
			  
			  x=document.forms["ruForm"]["txtContestantLName"].value;
			  if (x==null || x=="") {
			    alert("Last name is required.");
			  return false;
			  }
			  
			  x=document.forms["ruForm"]["txtPhone"].value;
			  if (x==null || x=="") {
			    alert("Phone number is required.");
			  return false;
			  }
			  if (x!=null && x.toString().length != 10) {
			    alert("Phone number must be 10 digits.");
			    return false;
			  }
			  
			  x=document.forms["ruForm"]["txtZip"].value;
			  if (x.toString().length != 0) {
			    if (x.toString().length != 5) {
			      alert("Zip Code must be 5 digits.");
			      return false;
			    }
			  }
			}
                        
                        function requireFields() {
			  var x=document.forms["regedit"]["connumsearch"].value;
			    if (x==null || x=="") {
			      alert("Please enter a valid number.");
			      return false;
			    }
			    
			    if (isNaN(x)) {
			      alert("Please enter a valid number.");
			      return false;
			    } 
                        }
                </script>
	</head>
	<body bgcolor="#A0CAF9">
		<form id="regedit" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" name="regedit" onsubmit="return requireFields()">
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
					<a href="editreg.php"><font face="arial" size="3">Edit Contestant</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<a href="editevent.php"><font face="arial" size="3">Edit Event</font></a>
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<table align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;">
						<tr align="center">
							<td align="center">
								<br />
								<font face="arial" size="3" color="#000000">Contestant Number Search:&nbsp;&nbsp;</font>
								<?php
									if ( isset($_POST['connumsearch']) )
									{
										echo "<input type='text' name='connumsearch' id='connumsearch' value='" . $_POST['connumsearch'] . "' />&nbsp;&nbsp;&nbsp;";
									}
									else
									{
										echo "<input type='text' name='connumsearch' id='connumsearch' />&nbsp;&nbsp;&nbsp;";
									}
								?>
								<input type="submit" value="Select Conestant" />
								<br />
								<br />
							</td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
			<?php if(isset($cn)) 	{ ?>
			<form id="ruForm" method="post" action="regupdate.php" name="ruForm" onsubmit="return requireFields2()">
			<tr align="center">
				<td align="center">
						<?php 
							if ( isset($_GET['contestant_id']) ) 
							{
								echo "<input type='hidden' name='hCID' value='" . $_GET['contestant_id'] . "' />";
							}
						?>
						<table align="center" cellpadding="5" cellspacing="0" border="1" style="border-collapse: collapse;">
							<tr align="center">
								<td align="center" colspan="8">
									<font face="arial" size="4" color="black"><b>Contestant Info:</b></font>
								</td>
							</tr>
							<tr align="center">
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Contestant #:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php
										//if (isset($_GET['contestant_no']))
										if (isset($cn) )
										{ echo "<input type='text' id='txtContestantNum' name='txtContestantNum' size='5' max='5' value='" . $cn . "' />"; }
										else
										{ echo "<input type='text' id='txtContestantNum' name='txtContestantNum' size='5' max='5' value='' />"; }
									?>
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">D.O.B. </font>
									<font face="arial" size="2" color="maroon">(ex: mm/dd/yyyy):</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php
                                                                                //if (isset($_GET['contestant_no']))
                                                                                if (isset($cn) )
                                                                                { 
										  $dates = explode('-',$cdob);
										  $formdate = $dates[1] . "/" . $dates[2] . "/" . $dates[0];
										  echo "<input type='text' id='txtContestantDOB' name='txtContestantDOB' onBlur='calculate_age();' value='" . $formdate . "' />"; 
										  
                                                                                }
                                                                                else
                                                                                { echo "<input type='text' id='txtContestantDOB' name='txtContestantDOB' onBlur='calculate_age();' />"; }
                                                                        ?>
								</td>
							<tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">First Name:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php
										if (isset($cn) )
										{ echo "<input type='text' id='txtContestantFName' name='txtContestantFName' size='15' max='15' value='" . $cfname . "' />"; }
										else
										{ echo "<input type='text' id='txtContestantFName' size='15' max='15' name='txtContestantFName' />"; }
									?>
&nbsp;&nbsp;&nbsp;
									<font face="arial" size="3" color="#000000">M.I. :</font>
									<?php
										if (isset($cn) )
										{ echo "<input type='text' id='txtContestantMI' name='txtContestantMI' size='1' max='1' style='width: 20px;' value='" . $cmi . "' />"; }
										else
										{ echo "<input type='text' id='txtContestantMI' name='txtContestantMI' width='20' size='1' max='1' style='width: 20px;' />"; }
									?>

								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Last Name:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php
										if (isset($cn) )
										{ echo "<input type='text' id='txtContestantLName' name='txtContestantLName' value='" . $clname . "' />"; }
										else
										{ echo "<input type='text' id='txtContestantLName' name='txtContestantLName' />"; }
									?>
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Age:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php
										//if (isset($_GET['contestant_no']))
										if (isset($cn) )
										{ echo "<input type='text' id='txtAge' name='txtAge' size='3' max='3' value='" . $cage . "' />"; }
										else
										{ echo "<input type='text' id='txtAge' name='txtAge' size='3' max='3' />"; }
									?>
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Phone # </font><font face="arial" size="2" color="maroon">(ex: 2565555555):</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php 
										//if (isset($_GET['contestant_no'])) 
										if (isset($cn) )
										{ echo "<input type='text' id='txtPhone' name='txtPhone' value='" . $cphone . "' />"; }
										else
										{ echo "<input type='text' id='txtPhone' name='txtPhone' />"; }
									?>
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Mailing Address:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php 
										//if (isset($_GET['contestant_no'])) 
										if (isset($cn) )
										{ echo "<input type='text' id='txtMailAddr' name='txtMailAddr' value='" . $caddr . "' />"; }
										else
										{ echo "<input type='text' id='txtMailAddr' name='txtMailAddr' />"; }
									?>
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">City:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php 
										//if (isset($_GET['contestant_no']))
										if (isset($cn) )
										{ echo "<input type='text' id='txtCity' name='txtCity' value='" . $ccity . "' />"; }
										else
										{ echo "<input type='text' id='txtCity' name='txtCity' />"; }
									?>
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">State:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php
										//if (isset($_GET['contestant_no']))
										if (isset($cn) )
										{ echo "<select id='txtState' name='txtState' value='" . $cstate . "'>"; }
										else
										{ echo "<select id='txtState' name='txtState' >"; }
									?>
										<option value="none">(SELECT)</option>
										<option value="AK" <?php if ( "$cstate" == "AK" ){ echo "selected='selected'"; } ?>>AK</option>
										<option value="AL" <?php if ( "$cstate" == "AL" ){ echo "selected='selected'"; } ?>>AL</option>
										<option value="AR" <?php if ( "$cstate" == "AR" ){ echo "selected='selected'"; } ?>>AR</option>
										<option value="AZ" <?php if ( "$cstate" == "AZ" ){ echo "selected='selected'"; } ?>>AZ</option>
										<option value="CA" <?php if ( "$cstate" == "CA" ){ echo "selected='selected'"; } ?>>CA</option>
										<option value="CO" <?php if ( "$cstate" == "CO" ){ echo "selected='selected'"; } ?>>CO</option>
										<option value="CT" <?php if ( "$cstate" == "CT" ){ echo "selected='selected'"; } ?>>CT</option>
										<option value="DE" <?php if ( "$cstate" == "DE" ){ echo "selected='selected'"; } ?>>DE</option>
										<option value="FL" <?php if ( "$cstate" == "FL" ){ echo "selected='selected'"; } ?>>FL</option>
										<option value="GA" <?php if ( "$cstate" == "GA" ){ echo "selected='selected'"; } ?>>GA</option>
										<option value="HI" <?php if ( "$cstate" == "HI" ){ echo "selected='selected'"; } ?>>HI</option>
										<option value="ID" <?php if ( "$cstate" == "ID" ){ echo "selected='selected'"; } ?>>ID</option>
										<option value="IL" <?php if ( "$cstate" == "IL" ){ echo "selected='selected'"; } ?>>IL</option>
										<option value="IN" <?php if ( "$cstate" == "IN" ){ echo "selected='selected'"; } ?>>IN</option>
										<option value="IA" <?php if ( "$cstate" == "IA" ){ echo "selected='selected'"; } ?>>IA</option>
										<option value="KS" <?php if ( "$cstate" == "KS" ){ echo "selected='selected'"; } ?>>KS</option>
										<option value="KY" <?php if ( "$cstate" == "KY" ){ echo "selected='selected'"; } ?>>KY</option>
										<option value="LA" <?php if ( "$cstate" == "LA" ){ echo "selected='selected'"; } ?>>LA</option>
										<option value="MA" <?php if ( "$cstate" == "MA" ){ echo "selected='selected'"; } ?>>MA</option>
										<option value="MD" <?php if ( "$cstate" == "MD" ){ echo "selected='selected'"; } ?>>MD</option>
										<option value="ME" <?php if ( "$cstate" == "ME" ){ echo "selected='selected'"; } ?>>ME</option>
										<option value="MI" <?php if ( "$cstate" == "MI" ){ echo "selected='selected'"; } ?>>MI</option>
										<option value="MN" <?php if ( "$cstate" == "MN" ){ echo "selected='selected'"; } ?>>MN</option>
										<option value="MO" <?php if ( "$cstate" == "MO" ){ echo "selected='selected'"; } ?>>MO</option>
										<option value="MS" <?php if ( "$cstate" == "MS" ){ echo "selected='selected'"; } ?>>MS</option>
										<option value="MT" <?php if ( "$cstate" == "MT" ){ echo "selected='selected'"; } ?>>MT</option>
										<option value="NC" <?php if ( "$cstate" == "NC" ){ echo "selected='selected'"; } ?>>NC</option>
										<option value="ND" <?php if ( "$cstate" == "ND" ){ echo "selected='selected'"; } ?>>ND</option>
										<option value="NE" <?php if ( "$cstate" == "NE" ){ echo "selected='selected'"; } ?>>NE</option>
										<option value="NH" <?php if ( "$cstate" == "NH" ){ echo "selected='selected'"; } ?>>NH</option>
										<option value="NJ" <?php if ( "$cstate" == "NJ" ){ echo "selected='selected'"; } ?>>NJ</option>
										<option value="NM" <?php if ( "$cstate" == "NM" ){ echo "selected='selected'"; } ?>>NM</option>
										<option value="NV" <?php if ( "$cstate" == "NV" ){ echo "selected='selected'"; } ?>>NV</option>
										<option value="NY" <?php if ( "$cstate" == "NY" ){ echo "selected='selected'"; } ?>>NY</option>
										<option value="OH" <?php if ( "$cstate" == "OH" ){ echo "selected='selected'"; } ?>>OH</option>
										<option value="OK" <?php if ( "$cstate" == "OK" ){ echo "selected='selected'"; } ?>>OK</option>
										<option value="OR" <?php if ( "$cstate" == "OR" ){ echo "selected='selected'"; } ?>>OR</option>
										<option value="PA" <?php if ( "$cstate" == "PA" ){ echo "selected='selected'"; } ?>>PA</option>
										<option value="RI" <?php if ( "$cstate" == "RI" ){ echo "selected='selected'"; } ?>>RI</option>
										<option value="SC" <?php if ( "$cstate" == "SC" ){ echo "selected='selected'"; } ?>>SC</option>
										<option value="SD" <?php if ( "$cstate" == "SD" ){ echo "selected='selected'"; } ?>>SD</option>
										<option value="TN" <?php if ( "$cstate" == "TN" ){ echo "selected='selected'"; } ?>>TN</option>
										<option value="TX" <?php if ( "$cstate" == "TX" ){ echo "selected='selected'"; } ?>>TX</option>
										<option value="UT" <?php if ( "$cstate" == "UT" ){ echo "selected='selected'"; } ?>>UT</option>
										<option value="VA" <?php if ( "$cstate" == "VA" ){ echo "selected='selected'"; } ?>>VA</option>
										<option value="VT" <?php if ( "$cstate" == "VT" ){ echo "selected='selected'"; } ?>>VT</option>
										<option value="WA" <?php if ( "$cstate" == "WA" ){ echo "selected='selected'"; } ?>>WA</option>
										<option value="WI" <?php if ( "$cstate" == "WI" ){ echo "selected='selected'"; } ?>>WI</option>
										<option value="WV" <?php if ( "$cstate" == "WV" ){ echo "selected='selected'"; } ?>>WV</option>
										<option value="WY" <?php if ( "$cstate" == "WY" ){ echo "selected='selected'"; } ?>>WY</option>
									</select>
									&nbsp;&nbsp;
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Zip:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<?php
										//if ( isset($_GET['contestant_no']) )
										if (isset($cn) )
										{
											echo "<input type='text' size='5' id='txtZip' name='txtZip' value='" . $czip . "' />";
										}
										else
										{
											echo "<input type='text' size='5' id='txtZip' name='txtZip' />";
										}
									?>
								</td>
							</tr>
							<tr align="center">
								<td align="right" colspan="2">
									<font face="arial" size="3" color="#000000">Email:</font>&nbsp;&nbsp;
								</td>
								<td align="left" colspan="2">
									<?php
										//if ( isset($_GET['contestant_no']) )
										if (isset($cn) )
										{
											echo "<input type='text' size='20' id='txtEmail' name='txtEmail' value='" . $cemail . "' />";
										}
										else
										{
											echo "<input type='text' size='20' id='txtEmail' name='txtEmail' />";
										}
									?>
								</td>
							</tr>
							<tr align="center">
								<td align="center" colspan="8">
									<!-- GO TO regsubmit.php -->
									<input type="submit" value="Update" />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<!-- GO TO HOME PAGE -->
									<input type="button" value="Cancel" onClick="parent.location='index.php'" />
								</td>
							</tr>
						</table>
					<p align="center">
						<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;
						<font face="arial" size="2" color="black">- Indicates a required field.</font>
					</p>
				</td>
			</tr>
			<?php } ?>
		</table>
		</form>
	</body>
</html>
