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

	include("index_Data.php");
	include("".$Function_Dir."/Functions.php");
	MysqlConnection();
	MysqlQuery();
	CheckFiles();
	
	$Page_Title = "WDK - Server Live";
	$Page_Content = "<iframe name='iframe' height='400px' width='800px'frameborder='0' src='".$Datafeed_Dir."/Datafeed_ServerLive.php' scrolling='auto' border='0' allowtransparency='true'></iframe>";

	include("".$Theme_Dir."/".THEME."/data.php");
	Mysql_Close_Connection();


?>