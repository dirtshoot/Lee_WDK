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

	include("../index_Data.php");
	include("../".$Function_Dir."/Functions.php");
	MysqlConnection();
	MysqlQuery();
	$Datafeed = true;
	include("../".$Theme_Dir."/".THEME."/data.php");	

	ob_start();
		$myusername=$_POST['myusername']; 
		$mypassword=(MD5($_POST['mypassword'])); 

		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);

		$sql="SELECT * FROM WDK_Users WHERE User_Name='$myusername' and User_Password='$mypassword'";
		$result=mysql_query($sql);
		$count=@mysql_num_rows($result);

		if($count==1){
			$Status_Query = mysql_query("SELECT * FROM WDK_Users WHERE User_Name='$myusername'");
			$Status = mysql_Fetch_array($Status_Query);
			$Status_Get = $Status['User_Status'];
				if($Status_Get == "0")
				{
					$ERROR = LOGIN_NOTACTIVE();
					header("location: ../login.php?error=".$ERROR."");
				}else{
					$_SESSION["myusername"] = $myusername;
					$_SESSION["mypassword"] = $mypassword;			
					header("location: ".WDK_Base."".$Admin_Dir."/Admin.php");
				}
		}else{
		$ERROR = LOGIN_FAILED();
		header("location: ../login.php?error=".$ERROR."");
		}
		

ob_end_flush();
Mysql_Close_Connection();
?>
