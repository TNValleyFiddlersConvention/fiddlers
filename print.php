
<html>
<head>
<title>ASU - Fiddlers Convention Events Search</title>
<link rel="stylesheet" href="./css/main.css" type="text/css" media="screen">
<link rel="stylesheet" href="./css/print.css" type="text/css" media="print">

<script type="text/javascript">
window.__CF=window.__CF||{};window.__CF.AJS={"ga_key":{"ua":"UA-15362284-1","ga_bs":"2"},"abetterbrowser":{"config":"none"}};

try{if (!window.CloudFlare) { var CloudFlare=[{verbose:0,p:1359082822,byc:0,owlid:"cf",mirage:{responsive:0,lazy:0},oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/abv=1870252173/"},atok:"e9a9bf022a40d3d2a7c0dd1af5f1b5f7",zone:"hsvff.com",rocket:"0",apps:{"ga_key":{"ua":"UA-15362284-1","ga_bs":"2"},"abetterbrowser":{"config":"none"}}}];
var a=document.createElement("script"),b=document.getElementsByTagName("script")[0];a.async=!0;a.src="//ajax.cloudflare.com/cdn-cgi/nexp/abv=4114775854/cloudflare.min.js";
b.parentNode.insertBefore(a,b);}}catch(e){};

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-15362284-1']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

(function(b){(function(a){"__CF"in b&&"DJS"in b.__CF?b.__CF.DJS.push(a):"addEventListener"in b?b.addEventListener("load",a,!1):b.attachEvent("onload",a)})(function(){"FB"in b&&"Event"in FB&&"subscribe"in FB.Event&&(FB.Event.subscribe("edge.create",function(a){_gaq.push(["_trackSocial","facebook","like",a])}),FB.Event.subscribe("edge.remove",function(a){_gaq.push(["_trackSocial","facebook","unlike",a])}),FB.Event.subscribe("message.send",function(a){_gaq.push(["_trackSocial","facebook","send",a])}));
"twttr"in b&&"events"in twttr&&"bind"in twttr.events&&twttr.events.bind("tweet",function(a){if(a){var b;if(a.target&&a.target.nodeName=="IFRAME")a:{if(a=a.target.src){a=a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);
b=0;
for(var c;c=a[b];++b)if(c.indexOf("url")===0){b=unescape(c.split("=")[1]);break a}}b=void 0}_gaq.push(["_trackSocial","twitter","tweet",b])}})})})(window);
	
function roll(obj, highlightcolor, textcolor)
{
	obj.style.backgroundColor = highlightcolor;
	obj.style.color = textcolor;
}

function printpage() {
	window.print()
}
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
<!-- #height="25px" -->
	<table class="tblLinks" align="center" valign="bottom" style="vertical-align: text-bottom;" width="800px" height="25px" border="0" cellpadding="0" cellspacing="0">
		<tr align="center">						
			<td align="center" bgcolor="#FFFFFF" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="160px">											
					<a href="./index.php" class="mnuLinks" title="Home Page"><b>Home</b></a>
			</td>
			<td align="center" bgcolor="#FFFFFF" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="160px">
					<a href="./newreg.php" class="mnuLinks" title="Add New Record"><b>New</b></a>
			</td>
			<td align="center" bgcolor="#FFFFFF" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="160px">
					<a href="./editreg.php" class="mnuLinks" title="Edit Contestants"><b>Edit</b></a>
			</td>
			<td align="center" bgcolor="#FFFFFF" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="160px">
					<a href="./searchcomp.php" class="mnuLinks" title="Search Database"><b>Search</b></a>
			</td>
		    <td align="center" bgcolor="#FFFFFF" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="160px">
                     <a href="./listcon.php" class="mnuLinks" title="Events"><b>Events</b></a>
            </td>	
            <td align="center" bgcolor="#FFFFFF" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="160px">
				<a href="./logout.php" class="mnuLinks" title="Logout"><b>Logout</b></a>
			</td>				
		</tr>
	</table>
	</td>	
	</tr>
	<tr align="center">
		<td class="noprint" align="center">
			<br />
				<a href="searchcomp.php"><font face="arial" size="3">Search Competitors</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="listcon.php"><font face="arial" size="3">Search Events</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="ordercont.php"><font face="arial" size="3">Start Event</font></a>
			<br />
		</td>
	</tr>
	<tr align="center">
		<td align="center">
			<br />
			<form name="fcForm" method="post" action="listcon.php">
			<table align="center" border="0">
				<tr align="center">
					<td align="center">
						<font face="arial" size="3" color="#000000">Select Event: </font>
							<select name='ddlCatList' onchange='document.fcForm.submit();'><option value='0'>SELECT CATEGORY</option>
							<option value=''>************** DAY 1 **************</option><option value='12'>Harmonica</option>
							<option value='14'>Mandolin</option><option value='4'>Bluegrass Banjo</option>
							<option value='9'>Dulcimer</option><option value='8'>Dobro</option>
							<option value='17'>Old Time Singing</option><option value=''>************** DAY 2 **************</option>
							<option value='1'>Beginning Fiddler (Age 10 & under)</option><option value='2'>Beginning Fiddler (Age 11-15)</option>
							<option value='10'>Guitar-Finger</option><option value='18'>Senior Fiddler</option>
							<option value='16'>Old Time Banjo</option><option value='7'>Classic Old Time Banjo</option>
							<option value='11'>Guitar-Flat Picking</option><option value='3'>Bluegrass Band</option>
							<option value='13'>Junior Fiddler</option><option value='15'>Old Time Band</option>
							<option value='5'>Buck Dancing (Age 15 & under)</option><option value='6'>Buck Dancing (Age 16 & older)</option>
							</select>							
					</td>
				</tr>
				<tr align="center">
					<td align="center">
						<br />
						<br />
						<table align="center" bgcolor="#FFFFDD" border="1" style="font-family: arial; color: #000000; border-collapse: collapse;">
						
						</table>
					</td>
				</tr>
				<tr align="center">
						<td class="noprint" align="center">
							<br />
							<!-- GO TO regsubmit.php -->
							<input type="button" value="Print Results" onclick="printpage()"/>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<!-- GO TO HOME PAGE -->									
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
