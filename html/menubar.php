<?php 
	//include("config.php");	// Include global config file

	$cellwidth="160px";		// Set the individual menu item width  =  number / 800px
	$cellbackcolor="#FFFFFF";
?>

<script type="text/javascript">		
	function roll(obj, highlightcolor, textcolor)
	{
		obj.style.backgroundColor = highlightcolor;
		obj.style.color = textcolor;
	}
</script>
	<table class="tblLinks" align="center" valign="bottom" style="vertical-align: text-bottom;" width="800px" height="25px" border="0" cellpadding="0" cellspacing="0">
		<tr align="center">						
			<td align="center" bgcolor="<?php echo $cellbackcolor; ?>" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="<?php echo $cellwidth; ?>">											
					<a href="./index.php" class="mnuLinks" title="Home Page"><b>Home</b></a>
			</td>
			<td align="center" bgcolor="<?php echo $cellbackcolor; ?>" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="<?php echo $cellwidth; ?>">
					<a href="./newreg.php" class="mnuLinks" title="Add New Record"><b>New</b></a>
			</td>
			<td align="center" bgcolor="<?php echo $cellbackcolor; ?>" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="<?php echo $cellwidth; ?>">
					<a href="./searchcomp.php" class="mnuLinks" title="Search Database"><b>Search / Edit</b></a>
			</td>
			<?php if($_SESSION['privs'] == 2) 	{ ?>
			<td align="center" bgcolor="<?php echo $cellbackcolor; ?>" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="<?php echo $cellwidth; ?>">
                                        <a href="./backstage.php" class="mnuLinks" title="Backstage Area"><b>Backstage Area</b></a>
                        </td>
                        <td align="center" bgcolor="<?php echo $cellbackcolor; ?>" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="<?php echo $cellwidth; ?>">
                                        <a href="./admin.php" class="mnuLinks" title="Backstage Area"><b>Admin</b></a>
                        </td>
			<?php } ?>
                       <td align="center" bgcolor="<?php echo $cellbackcolor; ?>" onMouseover="roll(this, '#3151B8', '#FFFFFF');" onMouseout="roll(this, '#FFFFFF','navy');" width="<?php echo $cellwidth; ?>">
					<a href="./logout.php" class="mnuLinks" title="Logout"><b>Logout</b></a>
			</td>
		</tr>
	</table>