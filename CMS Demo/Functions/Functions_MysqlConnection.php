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


//=======================================================
// Mysql Connect
//=======================================================
function MysqlConnection()
{

global $Mysql_Address;
global $Mysql_Username;
global $Mysql_Password;
global $Mysql_select_db;
			
	$Mysql_Connection	= @mysql_pconnect($Mysql_Address, $Mysql_Username, $Mysql_Password);
	$Mysql_Database		= @mysql_select_db($Mysql_select_db, $Mysql_Connection);

	if(!$Mysql_Connection)
	{
	die(ERROR_MysqlUnabletoConnectMysql().mysql_error());			
	}elseif(!$Mysql_Database)
	{
	ERROR_MysqlUnabletoSelectMysqlDB(); echo "".$Mysql_Database."!";
	}
}


//=======================================================
// Mysql Close
//=======================================================
function Mysql_Close_Connection()
{
	mysql_close();
}

?>