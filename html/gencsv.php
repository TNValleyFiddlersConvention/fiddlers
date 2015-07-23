<?php
	// This page is used to generate a CSV file of mailing list data from the database (given a selected year)
	session_start();

	// Include the DB config file
	include("../includes/dbconfig.php");

	// Get the event year
	$yr = strval($_GET['event_year']);

	// Connect to the database
	$db = mysql_connect($host, $username, $password);
	mysql_select_db("fidcon");
?>

<html>
<head>
	<title>Fiddlers Convention Mailing List CSV File Generator</title>
	<link href="http://mcs.athens.edu/fiddlers/images/favicon.ico" rel="SHORTCUT ICON" />

	<!-- JAVASCRIPT CODE USED FROM THE FOLLOW SOURCE -->
	<!-- http://debozden.webs.com/apps/blog/show/9708273-javascript-html-table-save-as-csv  -->
	<script type="text/javascript" language="javascript">
		function printDiv(divName)
		{
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}

		// Trim trailing text or characters
		function trimTail(str)
		{
        	        var tail = str.substring(0,str.length-1);  return tail;
	        }

		// Read the HTML table
		function readTable(t)
		{
                	var table = document.getElementById(t);
	                var rowLength = table.rows.length;
        	        var colLength = table.rows[0].cells.length;
                	var header = "";
	                var body = "";
        	        for(var i=0;i<colLength;i++)
			{
	                    header = header+table.rows[0].cells[i].innerHTML+",";
        	        }
                	header = trimTail(header);
	                for(var j=1;j<rowLength;j++)
			{
                	    	for(var k=0;k<colLength;k++)
				{// reading content of each column
	                        	body = body+table.rows[j].cells[k].innerHTML+",";
        	        	}
                	    	body = trimTail(body)+'\r\n';
	                }
        	        body = header+ '\r\n'+body;
                	saveFile(body);
	         }

		// Save the HTML table to a CSV file
		function saveFile(str)
		{
                	if (navigator.appName != 'Microsoft Internet Explorer')
			{
        	            window.open('data:text/csv;charset=utf-8,' + escape(str));	// Generate the mailing list CSV file (for Internet Explorer)
                	}
			else
			{
	        	        var popup = window.open('mailing_list.csv','csv','');	// Generate the mailing list CSV file (for UNIX, Linux, Mac, and the rest of the smart world)
	                }
        	}

		function mailList()
		{
			window.location = "mailing_list.csv";	// Go to the actual file that was generated
		}
	</script>
</head>
<body bgcolor="#A0CAF9">
<div id="printTable">
<p align="center">
	<font face="arial" size="4" color="navy"><b>ASU Fiddlers Convention <?php echo $yr; ?> Mailing List</b></font>
	<br />
	<a href="index.php">Back</a>
</p>
<p align="center">
	<input type="button" onClick="printDiv('printTable');" value="Print Mailing List" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" onClick="mailList();" value="Export To CSV" />
</p>
<table id="tblMailList" name="tblMailList" align="center" border="1" style="border-collapse: collapse; padding: 4px;">
	<tr align="center" bgcolor="white" style="color: navy;">
		<td align="center"><b>Contestant #</b></td>
		<td align="center"><b>First</b></td>
		<td align="center"><b>MI</b></td>
		<td align="center"><b>Last</b></td>
		<td align="center"><b>Address</b></td>
		<td align="center"><b>City</b></td>
		<td align="center"><b>State</b></td>
		<td align="center"><b>Zip</b></td>
	</tr>
<?php
	if ( isset($_GET['event_year']) )
	{
		$q = "SELECT DISTINCT * FROM contestants WHERE YEAR(registration_date) = '" . $yr . "' ORDER BY lname, fname ASC";
		$r = mysql_query($q);
		if (!$r)
		{
			echo "SQL SELECT FAILED: " . $q;
			echo "<br /> " . mysql_error();
		}
		$cnt = 0;						// Initialize the counter
		$myFile = "mailing_list.csv";			// Set the filename
		$fh = fopen($myFile, 'w') or die("file open failed");	// Set the file mode (write)
		while ( $myrow = mysql_fetch_assoc($r) )
		{
			$cid = $myrow['contestant_id'];
			$connum = $myrow['contestant_no'];
			$fn = $myrow['fname'];
			$mi = $myrow['mi'];
			$ln = $myrow['lname'];
			$addr = $myrow['address'];
			$city = $myrow['city'];
			$st = $myrow['state'];
			$zip = $myrow['zip'];
			$email = $myrow['email'];

			// Write the CSV file to the server at /var/www/fiddlers/admin/<DATE_GOES_HERE>_mailing_list.csv
			$strCSV = $connum . "," . $fn . "," . $mi . "," . $ln . "," . $addr . "," . $city . "," . $st . "," . $zip . "\n";
			fwrite($fh, $strCSV);

			// Generate the mailing list contents
			$c1 = "#BFBFBF";                        // Alternating Table Row Color #1 for Search Queries
		        $c2 = "#DDDDDD";                        // Alternating Table Row Color #2 for Search Queries
			if ( $cnt % 2 == 0 )
			{
				echo "<tr align='center' bgcolor='" . $c1 . "'>";
				echo "<td align='center' bgcolor='" . $c1 . "'>" . $connum . "</td>";
				echo "<td align='center' bgcolor='" . $c1 . "'>" . $fn . "</td>";
				echo "<td align='center' bgcolor='" . $c1 . "'>" . $mi . "</td>";
				echo "<td align='center' bgcolor='" . $c1 . "'>" . $ln . "</td>";
				echo "<td align='center' bgcolor='" . $c1 . "'>" . $addr . "</td>";
				echo "<td align='center' bgcolor='" . $c1 . "'>" . $city . "</td>";
				echo "<td align='center' bgcolor='" . $c1 . "'>" . $st . "</td>";
				echo "<td align='center' bgcolor='" . $c1 . "'>" . $zip . "</td>";
				echo "</tr>";
			}
			else
			{
				echo "<tr align='center' bgcolor='" . $c2 . "'>";
				echo "<td align='center' bgcolor='" . $c2 . "'>" . $connum . "</td>";
				echo "<td align='center' bgcolor='" . $c2 . "'>" . $fn . "</td>";
				echo "<td align='center' bgcolor='" . $c2 . "'>" . $mi . "</td>";
				echo "<td align='center' bgcolor='" . $c2 . "'>" . $ln . "</td>";
				echo "<td align='center' bgcolor='" . $c2 . "'>" . $addr . "</td>";
				echo "<td align='center' bgcolor='" . $c2 . "'>" . $city . "</td>";
				echo "<td align='center' bgcolor='" . $c2 . "'>" . $st . "</td>";
				echo "<td align='center' bgcolor='" . $c2 . "'>" . $zip . "</td>";
				echo "</tr>";
			}
			$cnt++;	// Increment the counter in the while loop
		}
		fclose($fh);
	}
?>
</table>
</div>
</body>
</html>
