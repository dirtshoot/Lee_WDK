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
// Admin - Update Theme Function
//=======================================================
function SetTheme($Theme)
{
	global $Admin_Dir;	
	$sql = ("UPDATE WDK_Pref` SET `Theme` = '$Theme'");
	mysql_query($sql);
		
		if (!mysql_query($sql))
		{
		die('Source Code: (Functions_MysqlUpdate.php) Function: (Function - SetTheme) Error:' . mysql_error());
		}else{	
		echo("<script language=\"javascript\">"); 
		echo("top.location.href = \"../../".$Admin_Dir."/Sendpage.php?fetch=Themes\";"); 
		echo("</script>"); 
		}
}
//=======================================================		
// Admin - Homepage Function
//=======================================================
function Update_Announcement_Mode($data)
{
	$sql = ("UPDATE WDK_Pref SET `Announcements_Display_Mode` = '$data'");
	mysql_query($sql);
	
	if (!mysql_query($sql))
	die('Source Code: (Functions_MysqlUpdate.php) Function: (Function - Update_Announcement_Mode) Error:' . mysql_error());
}

//=======================================================	
// Admin - Links Update Function
//=======================================================
Function Links_Update_Order($Order, $Link_id)
{
	$sql = ("UPDATE WDK_SiteLinks` SET `Link_Order` = '$Order' WHERE id='$Link_id'");
	mysql_query($sql);

		if (!mysql_query($sql))
		die('Source Code: (Functions_MysqlUpdate.php) Function: (Function - Links_Update_Order) Error:' . mysql_error());
}

//=======================================================	
// Admin - Edit/Create Page Update Function
//=======================================================		
Function Update_Page($Page_id, $Page_Name, $Page_Content, $Page_Link_id, $Page_Link_Name, $Page_Active)
{
	$Page_Update = ("UPDATE WDK_Pages SET `Page_Title` = '$Page_Name', `Page_Content` = '$Page_Content', `active` = '$Page_Active' WHERE id='$Page_id'");
	mysql_query($Page_Update);
		
		if(mysql_query($Page_Update))
		{
		
			$Link_Update = ("UPDATE WDK_SiteLinks SET `Link_Name` = '$Page_Link_Name' WHERE id='$Page_Link_id'");
			mysql_query($Link_Update);
			
				if(!mysql_query($Link_Update))
				die('Source Code: (Functions_MysqlUpdate.php) Function: (Function - Update_Page) Error:' . mysql_error());
			
		}else{
		die('Source Code: (Functions_MysqlUpdate.php) Function: (Function - Update_Page) Error:' . mysql_error());
		}
}

?>