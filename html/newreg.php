<?php
	include("./includes/dbconfig.php");
	include("sessioncheck.php");
?>

<script>
  function requireFields() {

    var x=document.forms["newContestant"]["txtContestantNum"].value;
    if (x==null || x=="") {
      alert("Contestant number is required.");
    return false;
    }
    
    if (isNaN(x)) {
      alert("Contestant number may only contain numbers.");
      return false;
    }
    
    x=document.forms["newContestant"]["txtDOB"].value;
    if (x==null || x=="") {
      alert("Date of birth is required.");
      return false;
    }
    
    var validformat=/^\d{1,2}\/\d{1,2}\/\d{4}$/;
    if (!validformat.test(x)) {
      alert("Format for date of birth should be mm/dd/yyyy.");
      return false;
    }
    
    x=document.forms["newContestant"]["txtContestantFName"].value;
    if (x==null || x=="") {
      alert("First name is required.");
      return false;
    }
    
    x=document.forms["newContestant"]["txtContestantLName"].value;
    if (x==null || x=="") {
      alert("Last name is required.");
      return false;
    }
    
    x=document.forms["newContestant"]["txtPhone"].value;
    if (x==null || x=="") {
      alert("Phone number is required.");
      return false;
    }
    if (x!=null && x.toString().length != 10) {
      alert("Phone number must be 10 digits.");
      return false;
    }
    
    x=document.forms["newContestant"]["txtZip"].value;
    if (x.toString().length != 0) {
      if (x.toString().length != 5) {
	alert("Zip Code must be 5 digits.");
	return false;
      }
    }
  }
</script>

<html>
	<head>
		<title>ASU - Fiddlers Convention Contestant Registration Form</title>
		<link rel="stylesheet" href="./css/main.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" media="all" href="./css/calendar.css" title="calendar" />
		<!-- <link href="./css/calendar.css" rel="stylesheet" type="text/css"> -->
		<script type="text/javascript" language="javascript">

			// function calculate_age(birth_month,birth_day,birth_year)
			function calculate_age()
			{
			    var dStr = document.getElementById('txtDOB').value;
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
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<a href="newreg.php"><font face="arial" size="3">New Contestant</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="newevent.php"><font face="arial" size="3">New Event</font></a>
					<br />
				</td>
			</tr>
			<tr align="center">
				<td align="center">
					<font face="arial" size="4" color="black"><b>Contestant Registration</b></font>
					<br /><br />
					<form method="post" action="reginsert.php" name="newContestant" onsubmit="return requireFields()">
						<table align="center" cellpadding="5" cellspacing="0" border="1" style="padding: 5px; border-collapse: collapse;">
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Contestant #:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtContestantNum" name="txtContestantNum" />
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Date of Birth:</font><font face="arial" size="2" color="maroon"><b> (ex: mm/dd/yyyy )</b>:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtDOB" name="txtDOB" onClick="" onBlur="calculate_age();" />
									</a>
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">First Name:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtContestantFName" name="txtContestantFName" />

									&nbsp;&nbsp;&nbsp;

									<font face="arial" size="3" color="#000000">M.I. :</font>
									&nbsp;&nbsp;&nbsp;
									<input type="text" id="txtContestantMI" name="txtContestantMI" size="1" max="1" style="width: 20px;" />
								</td>

								<td align="left">
									<font face="arial" size="3" color="#000000">Last Name:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtContestantLName" name="txtContestantLName" />
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Age:</font>
								</td>
								<td align="left">
									<input type="text" id="txtAge" name="txtAge" />
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Phone # </font><font face="arial" size="2" color="maroon"><b>(ex: 2565555555)</b>:</font>
									<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtPhone" name="txtPhone" />
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">Mailing Address:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtMailAddr" name="txtMailAddr" />
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">City:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtCity" name="txtCity" />
								</td>
							</tr>
							<tr align="center">
								<td align="left">
									<font face="arial" size="3" color="#000000">State:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<select id="txtState" name="txtState">
										<option value="none">(SELECT)</option>
										<option value="AK">AK</option>
										<option value="AL">AL</option>
										<option value="AR">AR</option>
										<option value="AZ">AZ</option>
										<option value="CA">CA</option>
										<option value="CO">CO</option>
										<option value="CT">CT</option>
										<option value="DE">DE</option>
										<option value="FL">FL</option>
										<option value="GA">GA</option>
										<option value="HI">HI</option>
										<option value="IA">IA</option>
										<option value="ID">ID</option>
										<option value="IL">IL</option>
										<option value="IN">IN</option>
										<option value="KS">KS</option>
										<option value="KY">KY</option>
										<option value="LA">LA</option>
										<option value="MA">MA</option>
										<option value="MD">MD</option>
										<option value="ME">ME</option>
										<option value="MI">MI</option>
										<option value="MN">MN</option>
										<option value="MO">MO</option>
										<option value="MS">MS</option>
										<option value="MT">MT</option>
										<option value="NC">NC</option>
										<option value="ND">ND</option>
										<option value="NE">NE</option>
										<option value="NH">NH</option>
										<option value="NJ">NJ</option>
										<option value="NM">NM</option>
										<option value="NV">NV</option>
										<option value="NY">NY</option>
										<option value="OH">OH</option>
										<option value="OK">OK</option>
										<option value="OR">OR</option>
										<option value="PA">PA</option>
										<option value="RI">RI</option>
										<option value="SC">SC</option>
										<option value="SD">SD</option>
										<option value="TN">TN</option>
										<option value="TX">TX</option>
										<option value="UT">UT</option>
										<option value="VA">VA</option>
										<option value="VT">VT</option>
										<option value="WA">WA</option>
										<option value="WI">WI</option>
										<option value="WV">WV</option>
										<option value="WY">WY</option>
									</select>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<font face="arial" size="3" color="#000000">Zip:</font>&nbsp;&nbsp;
									<input type="text" size="5" id="txtZip" name="txtZip" />
								</td>
								<td align="left">
									<font face="arial" size="3" color="#000000">Email:</font>&nbsp;&nbsp;
								</td>
								<td align="left">
									<input type="text" id="txtEmail" name="txtEmail" />&nbsp;&nbsp;
								</td>
							</tr>
							<tr align="center">
								<td align="center" colspan="4">
									<!-- GO TO HOME PAGE -->
									<input type="button" value="Cancel" onClick="parent.location='index.php'" />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<!-- GO TO regsubmit.php -->
									<input type="submit" value="Submit" />
								</td>
							</tr>
						</table>
					</form>
<script type="text/javascript">
    function catcalc(cal) {
        //var date = cal.date;
        var time = date.getTime()
        // use the _other_ field
//        var field = document.getElementById("f_calcdate");
   //  if (field == cal.params.inputField) {
     //       time -= Date.WEEK; // substract one week
//        } else {
//            time += Date.WEEK; // add one week
//        }
        field = document.getElementById("txtDOB");
	var date2 = new Date(time);
        field.value = date2.print("%m-%d-%Y");
//        field.value = date2.print("%Y-%m-%d %H:%M");
    }
    Calendar.setup({
        inputField      :    "txtDOB",   // id of the input field
        /* ifFormat        :    "%Y-%m-%d %H:%M", */       // format of the input field
	ifFormat	:	"%m-%d-%Y",
        showsTime       :    true,
        timeFormat      :    "24",
        onUpdate        :    catcalc
    });
	/*
    Calendar.setup({
        inputField     :    "f_calcdate",
        ifFormat       :    "%Y-%m-%d %H:%M",
        showsTime      :    true,
        timeFormat     :    "24",
        onUpdate       :    catcalc
    });
	*/
</script>

					<p align="center">
						<font face="arial" size="5" color="red"><b>*</b></font>&nbsp;
						<font face="arial" size="2" color="black">- Indicates a required field.</font>
					</p>
				</td>
			</tr>
			
		</table>	
	</body>
</html>
