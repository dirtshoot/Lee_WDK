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


// Other Pages with Mysql Query Calls (  Non Define )
////////////////////////////////////////////////////
// - - -  MysqlAdd.php
// - - - - - -  function Add_Page
////////////////////////////////////////////////////
// - - - Datafeed / Admin
// - - - - - - Datafeed_cp_Pages_Create.php
// - - - - - - Datafeed_cp_Homepage.php
// - - - - - - Datafeed_cp_Pages_Edit_Create.php
// - - - - - - Datafeed_cp_Links.php
////////////////////////////////////////////////////


function MysqlQuery()
{
// Setup Pref Information

$Pref_Query = mysql_query("SELECT * FROM WDK_Pref");
$Pref = mysql_fetch_array($Pref_Query);

	Define("THEME", $Pref['Theme']);
	Define("FOOTER", $Pref['Site_Footer']);

//=======================================================	
// Setup Page Information
//=======================================================
$Page_Query = mysql_query("SELECT * FROM WDK_Pages");
$Page = mysql_fetch_array($Page_Query);

	Define("PAGE_TITLE", $Page['Page_Title']);
	Define("PAGE_CONTENT", $Page['Page_Content']);
	Define("SITE_PAGE", $Page['Page_Address']);

//=======================================================
// Setup Render Page Information
//=======================================================
$Render_Page_id = $_GET['id'];
$Page_Query = mysql_query("SELECT * FROM WDK_Pages WHERE id='$Render_Page_id'");
$Page = mysql_fetch_array($Page_Query);

	Define("RENDER_PAGE_TITLE", $Page['Page_Title']);
	Define("RENDER_PAGE_CONTENT", $Page['Page_Content']);
	
//=======================================================	
// Setup Links 
//=======================================================
$Link_Query = mysql_query("SELECT * FROM WDK_SiteLinks ORDER BY Link_Order");
$Link_Order_Num = mysql_num_rows($Link_Query);

	Define("PREF_GET_LINKS",$Link_Query);
	Define("PREF_GET_LINK_NUM",$Link_Order_Num);

	
//=======================================================
// Render List of Pages for Edit/Add Pages
//=======================================================
$Edit_Add_Page_Query = mysql_query("SELECT * FROM WDK_Pages ORDER BY id DESC");

	Define("PREF_GET_PAGES",$Edit_Add_Page_Query);

//=======================================================
// Setup Admin Information
//=======================================================
$User_Session = $_SESSION['myusername'];
$User_Query = mysql_query("SELECT * FROM WDK_Users WHERE User_Name = '$User_Session'");
$User = mysql_fetch_array($User_Query);

	Define("USERADMIN", $User['User_Admin']);
	Define("ADMIN", 1);
	
//=======================================================	
// Get total number of new members
//=======================================================
$Pref_NewMembers_Query = mysql_query("SELECT * FROM WDK_Users WHERE User_Status = '0'");
$Pref_NewMembers = mysql_num_rows($Pref_NewMembers_Query);

	Define("PREF_NEW_MEMBERS", $Pref_NewMembers);	
	
//=======================================================
// Get total number of members
//=======================================================
$Pref_TotalMembers_Query = mysql_query("SELECT * FROM WDK_Users WHERE User_Status = '1'");
$Pref_TotalMembers = mysql_num_rows($Pref_TotalMembers_Query);
	
	Define("PREF_TOTAL_MEMBERS", $Pref_TotalMembers);		

//=======================================================
// ADMIN HOMEPAGE  -  Annoucements Display Mode
//=======================================================
$Mysql_Query_Mode = mysql_query("SELECT * FROM WDK_Pref WHERE Announcements_Display_Mode");
$Display_Mode = mysql_fetch_array($Mysql_Query_Mode);
$Display_Mode = $Display_Mode['Announcements_Display_Mode'];
	
	Define("PREF_DISPLAY_MODE", $Display_Mode);
	
//=======================================================
// ADMIN HOMEPAGE  -  Read Announcements
//=======================================================
$id_announcement = $_GET['id_announcement'];
$fetch_read_Announcement = mysql_query("SELECT * FROM WDK_Announcements WHERE id ='$id_announcement'");
$fetch_read_Announcement = mysql_fetch_array($fetch_read_Announcement);

	Define("Announcement_Title", $fetch_read_Announcement['title']);
	Define("Announcement_Info", $fetch_read_Announcement['information']);
	
//=======================================================
// ADMIN HOMEPAGE  -  Display Announcements
//=======================================================		
$fetch_Announcement_short = mysql_query("SELECT * FROM WDK_Announcements ORDER BY id DESC LIMIT 5");
$fetch_Announcement_long = mysql_query("SELECT * FROM WDK_Announcements ORDER BY id DESC LIMIT 2");
$fetch_Announcement_short_read = mysql_query("SELECT * FROM WDK_Announcements WHERE id = {$_GET['rid']}");
$fetch_Announcement_num = mysql_query("SELECT * FROM WDK_Announcements");
$fetch_Announcement_total = mysql_num_rows($fetch_Announcement_num);

	Define("ANNOUNCEMENTS_SHORT", $fetch_Announcement_short);
	Define("ANNOUNCEMENTS_LONG", $fetch_Announcement_long);
	Define("ANNOUNCEMENTS_SHORT_READ", $fetch_Announcement_short_read);
	Define("PREF_TOTAL_ANNOUNCEMENTS", $fetch_Announcement_total);
	
//=======================================================
// ADMIN  MEMBERS - Display Members
//=======================================================
$Mysql_Query_Admin_old = mysql_query("SELECT * FROM WDK_Users WHERE User_Status = '1' ORDER BY User_id DESC");
$Mysql_Query_Admin_new = mysql_query("SELECT * FROM WDK_Users WHERE User_Status = '0' ORDER BY User_id DESC");
//$Mysql_Query = mysql_query("SELECT * FROM WDK_Users WHERE User_Status != '0' ORDER BY User_id DESC ");
	
	Define("ADMIN_MEMBERS_OLD",$Mysql_Query_Admin_old);
	Define("ADMIN_MEMBERS_NEW",$Mysql_Query_Admin_new);
	//Define("ADMIN_MEMBERS",$Mysql_Query);

//=======================================================
// Theme Head - Get Homepage 
//=======================================================
$fetch_page_query = mysql_query("SELECT * FROM WDK_Pages WHERE id = '1'");
$fetch_page = mysql_fetch_array($fetch_page_query);
$Check_Page = $fetch_page['Page_Title'];

	Define("CHECK_PAGE", $Check_Page);

}
?>