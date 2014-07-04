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
	
	$geterror = $_GET['error'];
	
	$Page_Title = "WDK - Login";
	$Page_Content = '
	<div id="Error">'.$geterror.'</div>
			<form action="'.$Datafeed_Dir.'/Datafeed_CheckLogin.php" method="post"> 
			<table id="Login_Box">
			<tr><td id="Login_Box_Left_Table">Username:</td><td id="Login_Box_Right_Table"><input type="text" name="myusername" value=""></td></tr>
			<tr><td id="Login_Box_Left_Table">Password:</td><td id="Login_Box_Right_Table"><input type="password" name="mypassword" value=""></td></tr>
			<tr><td id="Login_Box_Left_Table"><input type="Submit" name="Submit" value="Login"></td></tr>
			</table>
			</form>
	
	';

	include("".$Theme_Dir."/".THEME."/data.php");
	Mysql_Close_Connection();


?>