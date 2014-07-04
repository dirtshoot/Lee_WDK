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
	if(!$_SESSION['myusername']){
	header("location: ../");
	}
	$Admin = true;
	include("../index_Data.php");
	include("../".$Function_Dir."/Functions.php");
	MysqlConnection();
	MysqlQuery();

	
		include("Admin_Functions.php");
		include("".WDK_Base."$Theme_Dir/".THEME."/ControlPanel/Admin_Template.php");		
		include("".WDK_Base."$Theme_Dir/".THEME."/data.php");
		
	Mysql_Close_Connection();

?>
