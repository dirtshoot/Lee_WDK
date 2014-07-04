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
	
	$geterror = $_GET['error'];
	
	$Page_Title = "WDK - Register";
	$Page_Content = '
	<div id="Error">'.$geterror.'</div>
			<form action="'.$Datafeed_Dir.'/Datafeed_CheckLogin.php" method="post"> 
			pending...
			</form>
	
	';

	include("".$Theme_Dir."/".THEME."/data.php");
	Mysql_Close_Connection();


?>