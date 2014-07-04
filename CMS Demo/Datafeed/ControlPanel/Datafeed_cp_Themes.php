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
		
			if(isset($_POST['theme_submit']))
			{
			$Theme = $_POST['theme'];
			SetTheme($Theme);
			}
			
			
			?>
			<html>
			<head>
			<TITLE><?php echo PAGE_TITLE; ?></TITLE>
			<link href="../../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
			</head>
			<body id="ControlPanel">
				<?php 
				// Scan Folders inside Theme
				$Theme_Scan_Dir = "../../".$Theme_Dir."";
				$Theme_Scan_Remove = array('.', '..');
				$Theme_Folder_Index = array_diff(scandir($Theme_Scan_Dir), $Theme_Scan_Remove);
				?><table width="20%"><?
					foreach($Theme_Folder_Index as $Theme_Folder)
					{
						unset($Theme_name);
						unset($Theme_version);
						unset($Theme_author);;
						unset($Theme_compatible);
						unset($Theme_readme);
						unset($Theme_Thumbnail);
						unset($Theme_Stylesheet);
						unset($Theme_Index);
						unset($Theme_description);
							
						// Turn off Warning Alert	
						error_reporting(0);
						$Theme_Scan_Read_Theme = "../../".$Theme_Dir."/".$Theme_Folder.""; // Theme Folder
						$Theme_Scan_Remove_Read_Theme = array('.', '..'); // Remove . .. from array
						$Theme_Folder_Index_Read_Theme = array_diff(scandir($Theme_Scan_Read_Theme), $Theme_Scan_Remove_Read_Theme); // Scan Theme Folder
						// include theme data.php into scan
						include("../../".$Theme_Dir."/".$Theme_Folder."/".$Theme_Folder_Index_Read_Theme[5].""); 
												
							if(!file_exists("../../".$Theme_Dir."/".$Theme_Folder."/".$Theme_Thumbnail.""))
							$Display_Thumbnail = "<img id=\"ControlPanel_Themes_Thumbnail\" src=\"../../".$Images_Dir."/Admin/NoTheme_Thumbnail.png\">";
							else
							$Display_Thumbnail = "<img id=\"ControlPanel_Themes_Thumbnail\" src=\"../../".$Theme_Dir."/".$Theme_Folder."/".$Theme_Thumbnail."\">";
						
						
							if($Theme_Folder == THEME)
							$Display_Themenail = "<img src=\"../../".$Images_Dir."/Admin/CurrentTheme_45.png\">";
							else
							$Display_Themenail = "
							<form action=\"".$_SERVER['php_self']."\" method=\"POST\" name=\"Theme_update\">
							<input type=\"hidden\" name=\"theme\" value=\"".$Theme_Folder."\">
							<input type=\"submit\" name=\"theme_submit\" value=\"\" style=\"background-image: url('../../".$Images_Dir."/Admin/SelectTheme_45.png'); width: 45px; height: 45px; border: 0px\"\">
							</form>
							";
							
						// Check Themes for correct files
						CheckThemeFiles();
						// Print theme on theme page
						?>
						<tr><td id="ControlPanel_Row_Header">
						<? echo $Theme_name; ?>
						</td></tr>
						<tr><td id="ControlPanel_Row_Header">
							<table id="ControlPanel_Themes_Subbox">
							<tr>
							<td>
							<? echo $Display_Thumbnail; ?>
							</td>
							<td valign="TOP">
							<? echo $Display_Themenail; ?>
							</td>
							<td id="ControlPanel_Themes_infobox">
							<b>Name:</b> 		 <? echo $Theme_name."<br />"; 			?> 
							<b>Version:</b>	  	 <? echo $Theme_version."<br />";	 	?>
							<b>Author:</b> 		 <? echo $Theme_author."<br />"; 		?>
							<b>Compatible:</b>   <? echo $Theme_compatible."<br />"; 	?>
							<b>Readme:</b>		 <? echo $Theme_readme."<br />"; 		?>
							<b>Description:</b>	 <? echo $Theme_description."<br />";	?>
							</td>
							</tr>
							</table>
						</td>
						</tr>
						<?}?>
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
