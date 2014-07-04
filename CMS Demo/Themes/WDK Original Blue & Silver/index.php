<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Copyright (C) 2006-2009 by KARIM BENNEGADI Nickname BEN,   All Rights Reserved www.dafsim.com
// 			DAFSIM stands for : Distributed Architecture for Flight SIMulation
// 
//      		 THIS HEADER MUST NOT BE CHANGED NOR REMOVED 
//
//      			 DAFSIM - "WDK" WEB DEVELOPMENT KIT 
//						BY LEE TENNANT
//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//				
//                                   WARNING!!!  - DO NOT EDIT  THIS INFORMATION !
	if($Page_Title == CHECK_PAGE)
	$layout_table_id = "Layout_Content_Menu_Home";
	else
	$layout_table_id = "Layout_Content_Menu";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Edit to customize your theme.
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
	<html>
	<? include("head.php"); ?>
	<body>
	<center>

		<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
		<td id="Layout_Background_Head"><img src='<? echo "".THEME_IMAGE."Logo.png"; ?>'></td>
		</tr>
		</table>

		<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
		<td id="Layout_Link_Menu">

		<table cellspacing="0" cellpadding="0"><tr><? SiteLinks(); ?></tr></table>
		</td>
		</tr>
		</table>

			<table cellspacing="0" cellpadding="0" width="100%">
			<tr><td id="Layout_Background_Repeat">
				<center>
				<table cellspacing="0" cellpadding="0">
				<tr>
				<td id="<? echo $layout_table_id; ?>">
					<table>
					<tr>
					<td id="Page_Title">
					<? echo $Page_Title; ?>
					</td>
					</tr>
					<tr>
					<td id="Page_Content">
					<? echo $Page_Content; ?>
					</td>
					</tr>
					</table>
				</td>
				</tr>
				</table>
				</center>
			</td></tr>
			<table>


		<table cellspacing="0" cellpadding="0" width="100%">
		<tr><td id="Layout_Footer"><?php echo FOOTER; ?>
		</td></tr><table>
		
	</body>
	</html>