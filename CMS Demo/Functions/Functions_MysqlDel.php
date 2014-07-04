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
// Admin - Homepage Functions
//=======================================================
function Del_Announcement($id)
{
	$sql = "DELETE FROM WDK_Announcements WHERE id = '$id'";
	
	if (!mysql_query($sql))
	{
	die('Source Code: (Functions_MysqlDel.php) Function: (Function - Del_Annoucement) Error:' . mysql_error());
	}else{
	?><meta http-equiv="refresh" content="0"><?
	unset($id);
	}
}

//=======================================================	
// Admin - Link Functions
//=======================================================
	function Del_Link($id)
	{
		$sql = "DELETE FROM WDK_SiteLinks WHERE id = '$id'";
		
		if (!mysql_query($sql))
		{
		die('Source Code: (Functions_MysqlDel.php) Function: (Function - Del_Link) Error:' . mysql_error());
		}else{
		?><meta http-equiv="refresh" content="0"><?
		unset($id);
		}
	}

//=======================================================	
// Admin - Edit/Page Functions
//=======================================================
function Del_Page($page_id, $page_link_id)
{
	$Delete_Page = "DELETE FROM WDK_Pages WHERE id = '$page_id'";
	mysql_query($Delete_Page);
		
		if(!mysql_query($Delete_Page))
		die('Source Code: (Functions_MysqlDel.php) Function: (Function - Del_Page) Error:' . mysql_error());
		
	$Delete_Link = "DELETE FROM WDK_SiteLinks WHERE id = '$page_link_id'";
	mysql_query($Delete_Link);
	
		if(!mysql_query($Delete_Link))
		die('Source Code: (Functions_MysqlDel.php) Function: (Function - Del_Page) Error:' . mysql_error());
		else
		?><meta http-equiv="refresh" content="0"><?
		

}
?>