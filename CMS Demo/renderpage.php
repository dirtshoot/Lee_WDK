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
	
	
	$Page_Title = RENDER_PAGE_TITLE;
	$Page_Content = RENDER_PAGE_CONTENT;

		
	include("".$Theme_Dir."/".THEME."/data.php");
	Mysql_Close_Connection();


?>