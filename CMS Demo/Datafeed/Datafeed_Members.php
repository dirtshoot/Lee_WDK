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
	$Mysql_Query_Admin_old = mysql_query("SELECT * FROM WDK_Users WHERE User_Status = '1' ORDER BY User_id DESC");
	$Mysql_Query_Admin_new = mysql_query("SELECT * FROM WDK_Users WHERE User_Status = '0' ORDER BY User_id DESC");
	$Mysql_Query = mysql_query("SELECT * FROM WDK_Users WHERE User_Status != '0' ORDER BY User_id DESC ");
				?>
				<html>
				<head>
				<TITLE><?php echo PAGE_TITLE;?></TITLE>
				<link href="../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
				</head>
				<body id="Members_Page">
					
					<table width="100%">
					<tr>
						<td id="Members_Table_Header">Username</td>
						<td id="Members_Table_Header">Email</td>
						<td id="Members_Table_Header">Pilot Rank</td>
						<td id="Members_Table_Header">Controller Rank</td>
					</tr>
						<?
						while($Mysql = mysql_fetch_array($Mysql_Query))
						{
							?>
							<tr>
								<td id="Members_Table_row"><a id="Members_Table_sublinks" href="../profile.php?id=<? echo $Mysql['User_id']; ?>" TARGET="_parent"><? echo $Mysql['User_Name'];?><a/></td>
								<td id="Members_Table_row"><? echo $Mysql['User_Email']; ?></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<?
						}
						?>
					</table>
				</body>
				</html>
				<?
			
	Mysql_Close_Connection();

?>
