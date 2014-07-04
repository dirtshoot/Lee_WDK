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
	function Add_Announcement($Announcement_title,$Announcement_Info)
	{
		$TimeStamp = date('h:m:s');
		$DateStamp = date('Y/m/d');
		
	$sql="INSERT INTO WDK_Announcements (id, title, information, datestamp, timestamp)
	VALUES
	(' ','$Announcement_title','$Announcement_Info','$DateStamp','$TimeStamp')"; 

		if (!mysql_query($sql))
		{
		die('Source Code: (Functions_MysqlAdd.php) Function: (Function - Add_Annoucement) Error:' . mysql_error());
		}else{
		?>
		<meta http-equiv="refresh" content="0">
		<?
		}
	}

//=======================================================		
// Admin - Links Functions
//=======================================================
function Add_Links($Link_Name, $Link_url, $Link_order)
{
	$sql="INSERT INTO WDK_SiteLinks (id, Link_Name, Link_Address, Link_Order)
	VALUES
	(' ','$Link_Name','$Link_url','$Link_order')";

	if (!mysql_query($sql))
	{
	die('Source Code: (Functions_MysqlAdd.php) Function: (Function - Add_Links) Error:' . mysql_error());
	}	

}

//=======================================================	
// Admin - Add / Edit  Page Functions
//=======================================================
function Add_Page($Page_Name, $Page_Content, $Page_Link_Name, $Page_Order, $Page_Active)
{
	
	$DateStamp = date('Y/m/d');
	
	$sql_page = "INSERT INTO WDK_Pages (id, Page_Title, Page_Content, datestamp, link_id, active)
	VALUES
	(' ','$Page_Name','$Page_Content', '$DateStamp', '0', '$Page_Active')";
	mysql_query($sql_page);
		
		if($sql_page)
		{
			$Page_Query = mysql_query("SELECT * FROM WDK_Pages WHERE Page_Title = '$Page_Name'");
			$Page_Fetch = mysql_fetch_array($Page_Query);
			$Page_id = $Page_Fetch['id'];
				
				
			$sql_link = "INSERT INTO WDK_SiteLinks (id, Link_Name, Link_Address, Link_Order)
			VALUES
			(' ','$Page_Link_Name','renderpage.php?id=$Page_id','$Page_Order')";
			mysql_query($sql_link);		
					
					
			if($sql_link)
			{
				$Page_Link_Query = mysql_query("SELECT * FROM WDK_SiteLinks WHERE Link_Name = '$Page_Link_Name'");
				$Page_Link_Fetch = mysql_fetch_array($Page_Link_Query);
				$Page_Link_id = $Page_Link_Fetch['id'];
				
				$sql_update = ("UPDATE WDK_Pages SET `link_id` = '$Page_Link_id' WHERE Page_Title='$Page_Name'");
				mysql_query($sql_update);	
			
				if(!mysql_query($sql_update))
				{
				die('Source Code: (Functions_MysqlAdd.php) Function: (Function - Add_Page) Error:' . mysql_error());
				}
			
			
			}else if(!mysql_query($sql_link))
			{
			die('Source Code: (Functions_MysqlAdd.php) Function: (Function - Add_Page) Error:' . mysql_error());
			}
					
		}else if(!mysql_query($sql_page))
		{
		die('Source Code: (Functions_MysqlAdd.php) Function: (Function - Add_Page) Error:' . mysql_error());
		}
}
?>