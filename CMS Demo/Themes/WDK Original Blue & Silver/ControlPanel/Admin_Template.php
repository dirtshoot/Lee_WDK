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
$fetch = $_GET['fetch'];

	if($fetch == "Members")
	{		
		$Page_Title = "WDK - Control Panel";					
		$Page_Content = '
			<table cellpadding="0" cellspacing="0">					
				<tr>
				<td id="ControlPanel_header">
				<Img src="../'.$Images_Dir.'/Admin/Members_20.png" border="0" align="ABSMIDDLE">&nbsp;<b>Members Accounts</b>&nbsp;'.Display_New_Members().'
				</td>
				</tr>
					<tr>
					<td id="ControlPanel_Body">
					'.ADMIN_MEMBERS.'
					</td>
					</tr>
				<tr>
				<td id="ControlPanel_footer">
				<img src="../'.$Images_Dir.'/Admin/ControlPanel_20.png" border="0" align="ABSMIDDLE">&nbsp;<a id="ControlPanel_SubCat" href="Admin.php">Return to Control Panel</a>
				</td>
				</tr>
			</table>
		';
	}elseif($fetch == "Themes")
	{
		$Page_Title = "WDK - Control Panel";
		$Page_Content = '
			<table cellpadding="0" cellspacing="0">					
				<tr>
				<td id="ControlPanel_header">
				<Img src="../'.$Images_Dir.'/Admin/Themes_20.png" border="0" align="ABSMIDDLE">&nbsp;<b>Themes</b>
				</td>
				</tr>
					<tr>
					<td id="ControlPanel_Body">
					'.ADMIN_THEMES.'
					</td>
					</tr>
				<tr>
				<td id="ControlPanel_footer">
				<img src="../'.$Images_Dir.'/Admin/ControlPanel_20.png" border="0" align="ABSMIDDLE">&nbsp;<a id="ControlPanel_SubCat" href="Admin.php">Return to Control Panel</a>
				</td>
				</tr>
			</table>
		';
	}elseif($fetch == "Preferences")
	{
		$Page_Title = "WDK - Control Panel";
		$Page_Content = '
			<table cellpadding="0" cellspacing="0">
			
				<tr>
				<td id="ControlPanel_header">
				<Img src="../'.$Images_Dir.'/Admin/Preferences_20.png" border="0" align="ABSMIDDLE">&nbsp;<b>Preferences</b>
				</td>
				</tr>	
					<tr>
					<td id="ControlPanel_Body">
					'.ADMIN_PREFERENCES.'
					</td>
					</tr>
				<tr>
				<td id="ControlPanel_footer">
				<img src="../'.$Images_Dir.'/Admin/ControlPanel_20.png" border="0" align="ABSMIDDLE">&nbsp;<a id="ControlPanel_SubCat" href="Admin.php">Return to Control Panel</a>
				</td>
				</tr>
			</table>
		';
	}elseif($fetch == "Homepage")
	{

		$Page_Title = "WDK - Control Panel";
		$Page_Content = '
			<table cellpadding="0" cellspacing="0">	
				<tr>
				<td id="ControlPanel_header">
				<Img src="../'.$Images_Dir.'/Admin/Homepage_20.png" border="0" align="ABSMIDDLE">&nbsp;<b>Homepage</b>
				</td>
				</tr>
					<tr>
					<td id="ControlPanel_Body">
						'.ADMIN_HOMEPAGE.'
					</td>
					</tr>
					
				<tr>
				<td id="ControlPanel_footer">
				<img src="../'.$Images_Dir.'/Admin/ControlPanel_20.png" border="0" align="ABSMIDDLE">&nbsp;<a id="ControlPanel_SubCat" href="Admin.php">Return to Control Panel</a>
				</td>
				</tr>
			</table>
		';
	}elseif($fetch == "Links")
	{

		$Page_Title = "WDK - Control Panel";
		$Page_Content = '
			<table cellpadding="0" cellspacing="0">	
				<tr>
				<td id="ControlPanel_header">
				<Img src="../'.$Images_Dir.'/Admin/Links_20.png" border="0" align="ABSMIDDLE">&nbsp;<b>Links</b>
				</td>
				</tr>
					<tr>
					<td id="ControlPanel_Body">
						'.ADMIN_LINKS.'
					</td>
					</tr>
					
				<tr>
				<td id="ControlPanel_footer">
				<img src="../'.$Images_Dir.'/Admin/ControlPanel_20.png" border="0" align="ABSMIDDLE">&nbsp;<a id="ControlPanel_SubCat" href="Admin.php">Return to Control Panel</a>
				</td>
				</tr>
			</table>
		';
	}elseif($fetch == "Pages")
	{

		$Page_Title = "WDK - Control Panel";
		$Page_Content = '
			<table cellpadding="0" cellspacing="0">	
				<tr>
				<td id="ControlPanel_header">
				<Img src="../'.$Images_Dir.'/Admin/Pages_20.png" border="0" align="ABSMIDDLE">&nbsp;<b>Edit/Create Pages</b>
				</td>
				</tr>
					<tr>
					<td id="ControlPanel_Body">
						'.ADMIN_PAGES.'
					</td>
					</tr>
					
				<tr>
				<td id="ControlPanel_footer">
				<img src="../'.$Images_Dir.'/Admin/ControlPanel_20.png" border="0" align="ABSMIDDLE">&nbsp;<a id="ControlPanel_SubCat" href="Admin.php">Return to Control Panel</a>
				</td>
				</tr>
			</table>
		';
	}elseif($fetch == "MySettings")
	{

		$Page_Title = "WDK - Control Panel";
		$Page_Content = '
			<table cellpadding="0" cellspacing="0">	
				<tr>
				<td id="ControlPanel_header">
				<Img src="../'.$Images_Dir.'/Admin/MySettings_20.png" border="0" align="ABSMIDDLE">&nbsp;<b>My Settings</b>
				</td>
				</tr>
					<tr>
					<td id="ControlPanel_Body">
						'.ADMIN_MYSETTINGS.'
					</td>
					</tr>
					
				<tr>
				<td id="ControlPanel_footer">
				<img src="../'.$Images_Dir.'/Admin/ControlPanel_20.png" border="0" align="ABSMIDDLE">&nbsp;<a id="ControlPanel_SubCat" href="Admin.php">Return to Control Panel</a>
				</td>
				</tr>
			</table>
		';	
	}elseif($fetch == "Logout")
	{
		session_destroy();
		header("location: ../");
	}else{
	header("location: ../");
	}
	
	
?>