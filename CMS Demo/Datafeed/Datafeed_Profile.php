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
	$profile_id = $_GET['id'];
		?>
		<html>
		<head>
		<TITLE><?php echo PAGE_TITLE; ?></TITLE>
		<link href="../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
		</head>
		<body style="background-color: transparent;">
		<? echo $profile_id; ?>
		</body>
		</html>
		<?
		
	Mysql_Close_Connection();

?>
