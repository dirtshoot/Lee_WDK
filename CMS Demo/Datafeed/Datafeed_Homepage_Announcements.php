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
	include("../index_Data.php");
	include("../".$Function_Dir."/Functions.php");
	MysqlConnection();
	MysqlQuery();
	$Datafeed = true;
	include("../".$Theme_Dir."/".THEME."/data.php");
	$Mysql_Query = mysql_query("SELECT * FROM WDK_Users");
	$SHORT_READ = $_GET['sread'];
		?>
		<html>
		<head>
		<TITLE><?php echo PAGE_TITLE; ?></TITLE>
		<link href="../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
		</head>
		<body style="background-color: transparent;">
			<?
			 // DISPLAY SHORT MODE
			if((PREF_DISPLAY_MODE == 0) && ( $SHORT_READ == 0))
			 {
				
				while($rows = mysql_fetch_array(ANNOUNCEMENTS_SHORT))
				{
				?>
				<table cellpadding="0" cellspacing="0" id="Announcement_Table">
				<tr>
				<td onclick="window.location='Datafeed_Homepage_Announcements.php?sread=1&rid=<?php echo $rows['id'];?>'" id="Announcement_Table_h0">
					<div id="Announcement_SmallDisplay_Date"><?php echo "".$rows['datestamp']."";?></div>
					<div id="Announcement_SmallDisplay_Title"><?php echo "".$rows['title']."";?></div>
				</td>
				</tr>
				</table>
				<?				
				}		
			 
			 
			 }elseif(PREF_DISPLAY_MODE == 1)
			 {
				while($rows = mysql_fetch_array(ANNOUNCEMENTS_LONG))
				{
				?>
				<table cellpadding="0" cellspacing="0" id="Announcement_Table">
				<tr>
				<td id="Announcement_Table_h1">
					<div id="Announcement_Date"><?php echo "".$rows['datestamp']."";?></div>
					<div id="Announcement_Title"><?php echo "".$rows['title']."";?></div>
				</td>
				</tr>
				
				<tr>
				<td id="Announcement_Table_h2">
				<?php echo "".$rows['information']."";?>
				</td>
				</tr>
				
				<tr>
				<td id="Announcement_Table_h3">
				</td>
				</tr>
				</table>
				<?				
				}
			 }elseif(($SHORT_READ == 1) && (PREF_DISPLAY_MODE == 0))
			 {
			 
				$rows = mysql_fetch_array(ANNOUNCEMENTS_SHORT_READ);
					
				?>
				<table cellpadding="0" cellspacing="0" id="Announcement_Table">
				<tr>
				<td id="Announcement_Table_h1">
					<div id="Announcement_Date"><?php echo "".$rows['datestamp']."";?></div>
					<div id="Announcement_Title"><?php echo "".$rows['title']."";?></div>
				</td>
				</tr>
				
				<tr>
				<td id="Announcement_Table_h2">
				<?php echo "".$rows['information']."";?>
				</td>
				</tr>
				
				<tr>
				<td id="Announcement_Table_h3">
				</td>
				</tr>
				</table>
				<?					 
			 }
			?>
		</body>
		</html>
		<?
		
	Mysql_Close_Connection();

?>
