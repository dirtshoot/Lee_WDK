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
	
		if(isset($_POST['Page_Read']))
		{
		$page_id = $_POST['page_id'];
		?>
		<SCRIPT LANGUAGE="javascript"> 
		<!--
		top.location.href = "../../renderpage.php?id=<? echo $page_id; ?>"; 
		//---> 
		</SCRIPT>
		<?
		}
			if(isset($_POST['Page_Edit']))
			{
			$page_id = $_POST['page_id'];
			?><meta http-equiv="refresh" content="0; url=Datafeed_cp_Pages_Edit_Create.php?pstat=2&cpid=<? echo $page_id; ?>"><?
			}
		
				if(isset($_POST['Page_Del']))
				{
					$page_id = $_POST['page_id'];
					$page_link_id = $_POST['page_link_id'];
					Del_Page($page_id, $page_link_id);
				}
		
		?>
		<html>
		<head>
		<TITLE><?php echo PAGE_TITLE; ?></TITLE>
		<link href="../../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
		</head>
		<body id="ControlPanel">

		<table width="100%">
		<tr>
		<td valign="TOP" align="left" width="20%">
		
			<table><tr><td style="height: 10px;"></td></tr></table>
			<table cellspacing="0" cellpadding="0">
			<tr>
			<td id="ControlPanel_Icons">
			<a href="Datafeed_cp_Pages_Edit_Create.php?pstat=1"><img src="../../<?php echo $Images_Dir; ?>/Admin/Pages_Create_48.png" border="0"> Create a New Page!</a>
			</td>
			</tr>
			</table>
			
		</td>
		<td valign="TOP" align="left" width="80%">
					
			<table width="100%">
			<tr>
			<td id="ControlPanel_Row_Header" style="width: 10%">ID</td>
			<td id="ControlPanel_Row_Header" style="width: 50%">Title</td>
			<td id="ControlPanel_Row_Header" style="width: 20%">Date Created</td>
			<td id="ControlPanel_Row_Header" style="width: 20%">Action</td>
			<td></td>
			</tr>
			</table>

			
			<? 
			if(mysql_num_rows(PREF_GET_PAGES) <= 1)
			{
			?>
			<table width="100%">
			<tr>
			<td id="ControlPanel_Row" style="width: 100%">No pages created at this time.</td>
			</tr>
			</table>
			
			<?
			}
			
			while($Page_Row = mysql_fetch_array(PREF_GET_PAGES))
			{

				if($Page_Row['id'] != 1)
				{
				?>
				
				<table width="100%">
				<tr>
				<td id="ControlPanel_Row" style="width: 10%"><form action="<? $_SERVER['php_self'] ?>" method="POST" name="display_pages"><? echo $Page_Row['id']; ?></td>
				<td id="ControlPanel_Row" style="width: 50%"><? echo $Page_Row['Page_Title']; ?></td>
				<td id="ControlPanel_Row" style="width: 20%"><? echo $Page_Row['datestamp']; ?></td>
				<td id="ControlPanel_Row" style="width: 20%">
				
					
					<input type="hidden" name="page_id" value="<?php echo $Page_Row['id']; ?>">
					<input type="hidden" name="page_link_id" value="<?php echo $Page_Row['link_id']; ?>">
					<input id="ControlPanel_Remove_Icon" type="Submit" value="" name="Page_Del" onClick="if(confirm('Please confirm you wish to remove \n <?php echo $Page_Row['Page_Title']; ?>'))return true;else return false;" title="Remove: <?php echo $Page_Row['Page_Title']; ?>">
					<input id="ControlPanel_Edit_Icon" type="Submit" value="" name="Page_Edit"  title="Edit: <?php echo $Page_Row['Page_Title']; ?>">
					<input id="ControlPanel_Read_Icon" type="Submit" value="" name="Page_Read"  title="View: <?php echo $Page_Row['Page_Title']; ?>">
					
					
				</td>
				<td></form></td>
				</tr>
				</table>
				
				<?
				}
			}
		?>
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
