<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Copyright (C) 2006-2009 by KARIM BENNEGADI Nickname BEN,   All Rights Reserved www.dafsim.com
// 			DAFSIM stands for : Distributed Architecture for Flight SIMulation
// 
//      		 THIS HEADER MUST NOT BE CHANGED NOR REMOVED 
//
//			DAFSIM - "WDK" WEB DEVELOPMENT KIT    BY  LEE TENNANT					
// 					http:// www.leetennant.net
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	session_start();
	if(!$_SESSION['myusername'])
	header("location: ../../");
			
	include("../../index_Data.php");
	include("../../".$Function_Dir."/Functions.php");
	MysqlConnection();
	MysqlQuery();
	$Datafeed = true;
	include("../../".$Theme_Dir."/".THEME."/data.php");
	
if(USERADMIN == ADMIN)
{		
	//=======================================================
	// Read Announcements Part 1
	//=======================================================
	if(isset($_POST['Read_Announcement']))
	{	
		?>
		<script type="text/javascript">
		window.open( "Datafeed_cp_Homepage.php?ref=read&id_announcement=<?php echo $_POST['id_announcement']; ?>", "Read", 
		"status = 1, height = 500, width = 400, resizable = 0" )
		</script>
		<?
	}
	//=======================================================
	// Render Read Part 2
	//=======================================================
		if($_GET['ref'] == "read")
			{		
				?>
				<html>
				<body>
				<img src="../../<? echo $Theme_Dir; ?>/<? echo THEME; ?>/Images/Logo.png"><br />
				<b><?php echo Announcement_Title; ?></b>
				<br></br>
				<?php echo Announcement_Info; ?>
				</body>
				</html>
				<?
				die();
			}
		
	//=======================================================	
	// Remove Announcements
	//=======================================================
	if(isset($_POST['Del_Announcement']))
	{
		$id = $_POST['Del_Id'];
		Del_Announcement($id);
	}
	//=======================================================
	// Post New Announcements
	//=======================================================
	if(isset($_POST['Announcement_submit']))
	{
		$Announcement_title = $_POST['Announcement_title'];
		$Announcement_Info = $_POST['Announcement_Info'];
		
		if((empty($Announcement_title)) || (empty($Announcement_Info)))
		{
		ERROR_CP_Homepage_fieldblank();
		}else{	
		Add_Announcement($Announcement_title, $Announcement_Info);
		}
	}
		
	// Update Mode Announcements
	//=======================================================
	if(isset($_POST['submit_mode']))
	{
		$data = $_POST['Mode_select'];
		Update_Announcement_Mode($data);
		
	}
	
	// Generate Homepage Page
	//=======================================================
	?>
	<html>
	<head>
	<TITLE><?php echo PAGE_TITLE; ?></TITLE>
	<link href="../../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
	</head>
	<body id="ControlPanel">
		
		<table width="100%">
		<tr>
		<td valign="TOP" width="40%">
		
			<table width="100%">
			<tr>
			<td id="ControlPanel_Row_Header">Create a new announcement!</td>
			</tr>
			</table>
			

				<table width="100%">
				<tr>
				<td valign="TOP">
				
					<table><tr><td style="height: 1px;"></td></tr></table>
					<table width="100%">
					<tr>
					<td id="ControlPanel_Row" valign="top" align="right">Title:</td>
					</tr>
					</table>
					
					<table><tr><td style="height: 1px;"></td></tr></table>
					<table width="100%">
					<tr>
					<td id="ControlPanel_Row" valign="top" align="right">Body:</td>
					</tr>
					</table>
					
				</td>
				<td  valign="TOP">
					<table width="100%">
					<tr>
						<td>
							<form action="<? $_SERVER['php_self'] ?>" method="POST" name="Announcement_form">
							<input id="ControlPanel_Row" type="text" name="Announcement_title">
						</td>
					</tr>
					<tr>
						<td>
								<SCRIPT LANGUAGE="JavaScript">
								function textCounter(field,cntfield,maxlimit) 
								{
									if (field.value.length > maxlimit)
									field.value = field.value.substring(0, maxlimit);
									else
									cntfield.value = maxlimit - field.value.length;
									
								}
								</script>
							
							<textarea name="Announcement_Info" wrap="physical" id="ControlPanel_Row" rows="12" cols="40" onKeyDown="textCounter(document.Announcement_form.Announcement_Info,document.Announcement_form.counter,310)" onKeyUp="textCounter(document.Announcement_form.Announcement_Info,document.Announcement_form.counter,310)"></textarea>
							<input readonly type="text" name="counter" size="3" maxlength="3" value="310" id="ControlPanel_Row">&nbsp;<span id="ControlPanel_Row">Characters left&nbsp;</span>

						</td>
					</tr>
					</table>
				</td>	
				</tr>
				</table>
					
					
				<table width="25%">
				<tr>
					<td><input id="ControlPanel_Row_Header" type="submit" name="Announcement_submit" value="Post Announcement"></td>
				</tr>
				</table>
				
			</form>
			
			
		</td>
		<td valign="TOP" width="60%">
		
			<table width="100%">
			<tr>
			<td id="ControlPanel_Row_Header" style="width: 10px">ID</td>
			<td id="ControlPanel_Row_Header" style="width: 80px">Title</td>
			<td id="ControlPanel_Row_Header" style="width: 80px">Date</td>
			<td id="ControlPanel_Row_Header" style="width: 80px">Posted</td>
			<td id="ControlPanel_Row_Header" style="width: 80px">Action</td>
			</tr>
			</table>
			
			<table width="100%">
				<? 
					$Homepage_Announcements = mysql_query("SELECT * FROM WDK_Announcements ORDER BY id Desc LIMIT 10");
					if(mysql_num_rows($Homepage_Announcements) == 0)
					{
					?>
					<tr>
					<td id="ControlPanel_Row" style="height: 20px;">No announcements at this time.</td>
					</tr>
					<?
					}
						while($rows = mysql_fetch_array($Homepage_Announcements))
						{
							$title = substr("".$rows['title']."", 0, 10);
						?>
						<form name="Del_Announcement" action="<? $_SERVER['php_self'] ?>" method="POST">
						<form name="Read_Announcement" action="<? $_SERVER['php_self'] ?>" method="POST">
						<tr>
						<td id="ControlPanel_Row" style="width: 10px"><?php echo $rows['id']; ?></td>
						<td id="ControlPanel_Row" style="width: 80px"><?php echo $title; ?>...</td>
						<td id="ControlPanel_Row" style="width: 80px"><?php echo $rows['datestamp']; ?></td>
						<td id="ControlPanel_Row" style="width: 80px"><?php echo $rows['timestamp']; ?></td>
						<td id="ControlPanel_Row" style="width: 80px">
						
							
							<input type="hidden" name="Del_Id" value="<?php echo $rows['id'];?>">
							<input id="ControlPanel_Remove_Icon" type="Submit" value="" name="Del_Announcement" onClick="if(confirm('Please confirm you wish to remove \n <?php echo $rows['title']; ?>'))return true;else return false;" title="Remove: <?php echo $title; ?>...">
							

							
							<input type="hidden" name="id_announcement" value="<?php echo $rows['id'];?>">
							<input id="ControlPanel_Read_Icon" type="Submit" value="" name="Read_Announcement"  title="Read: <?php echo $title; ?>...">
							
						
						</td>
						</tr>
						</form>
						</form>
						<?
						}
						?>
						

			</table>
			
			<table><tr><td style="height: 10px;"></td></tr></table>
			
			<table width="100%">
			<tr>
			<td id="ControlPanel_Row_Header">Homepage Configuration</td>
			</tr>
			</table>
			
			<table width="100%">
			<tr>
			<td valign="TOP">
				<table><tr><td style="height: 2px;"></td></tr></table>
				<table width="100%">
				<tr>
				<td id="ControlPanel_Row" valign="top" align="right">Headline Display Mode:</td>
				</tr>
				</table>
			</td>
			<td valign="TOP">
				<table width="100%">
				<tr>
				<td>									
					<form action="<? $_SERVER['php_self'] ?>" method="POST" name="Mode_homepage">
					<SELECT name="Mode_select" id="ControlPanel_Row" style="Font-size: 12px;">									
					<option value="0" <? if(PREF_DISPLAY_MODE == 0){ ?>SELECTED<?}?>>Retracted Mode</Option>
					<option value="1" <? if(PREF_DISPLAY_MODE == 1){ ?>SELECTED<?}?>>Extended Mode</Option>
					</SElECT>
					<input type="submit" name="submit_mode" value="Update" id="ControlPanel_Row_Header">
					</form>
				</tr>
				</table>
			</td>
			</tr>
			</table>
			
		</td>
		</tr>
		</table>
	</body>
	</html>
	<?
}else{
	?>
	<html>
	<head>
	<TITLE><?php echo PAGE_TITLE; ?></TITLE>
	<link href="../../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
	</head>
	<body id="ControlPanel">
	<?php ADMIN_NOACCESS(); ?>
	</body>
	</html>
	<?
}
Mysql_Close_Connection();
?>
