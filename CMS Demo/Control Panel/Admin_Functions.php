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
		
	function Admin_Icons()
	{
		global $Datafeed_Dir;
		global $Images_Dir;
		
		$Admin_Link = array();
		$Admin_Icons = array();
		$Admin_Labels = array();

		$Admin_Link[0] = "Sendpage.php?fetch=Members";
		$Admin_Link[1] = "Sendpage.php?fetch=Themes";
		$Admin_Link[2] = "Sendpage.php?fetch=Preferences";
		$Admin_Link[3] = "Sendpage.php?fetch=Homepage";
		$Admin_Link[4] = "Sendpage.php?fetch=Links";
		$Admin_Link[5] = "Sendpage.php?fetch=Logout";
		$Admin_Link[6] = "Sendpage.php?fetch=Pages";
		$Admin_Link[7] = "Sendpage.php?fetch=MySettings";
		
		$Admin_Labels[0] = "Members";
		$Admin_Labels[1] = "Themes";
		$Admin_Labels[2] = "Preferences";
		$Admin_Labels[3] = "Homepage";
		$Admin_Labels[4] = "Links";
		$Admin_Labels[5] = "Logout";
		$Admin_Labels[6] = "Edit/Create Pages";
		$Admin_Labels[7] = "My Settings";
		
		$Admin_Icons[0] = "<Img src='../$Images_Dir/Admin/Members_48.png' border='0'>";
		$Admin_Icons[1] = "<Img src='../$Images_Dir/Admin/Themes_48.png' border='0'>";
		$Admin_Icons[2] = "<Img src='../$Images_Dir/Admin/Preferences_48.png' border='0'>";
		$Admin_Icons[3] = "<Img src='../$Images_Dir/Admin/Homepage_48.png' border='0'>";
		$Admin_Icons[4] = "<Img src='../$Images_Dir/Admin/Links_48.png' border='0'>";
		$Admin_Icons[5] = "<Img src='../$Images_Dir/Admin/Logout_48.png' border='0'>";
		$Admin_Icons[6] = "<Img src='../$Images_Dir/Admin/Pages_48.png' border='0'>";
		$Admin_Icons[7] = "<Img src='../$Images_Dir/Admin/MySettings_48.png' border='0'>";
		
			if(USERADMIN == ADMIN)
			{				
				$Admin_Construct .="<table cellpadding='0' cellspacing='0' width='100%'><tr>";
				$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[0]'>$Admin_Icons[0]<br />$Admin_Labels[0]</a></td>";
				$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[1]'>$Admin_Icons[1]<br />$Admin_Labels[1]</a></td>";
				$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[2]'>$Admin_Icons[2]<br />$Admin_Labels[2]</a></td>";
				$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[3]'>$Admin_Icons[3]<br />$Admin_Labels[3]</a></td>";
				$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[4]'>$Admin_Icons[4]<br />$Admin_Labels[4]</a></td>";
				$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[5]' onClick=\"if(confirm('Please confirm you wish to logout?'))return true;else return false;\">$Admin_Icons[5]<br />$Admin_Labels[5]</a></td>";
				$Admin_Construct .="</tr><tr>";
				$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[6]'>$Admin_Icons[6]<br />$Admin_Labels[6]</a></td>";
				$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[7]'>$Admin_Icons[7]<br />$Admin_Labels[7]</a></td>";
				$Admin_Construct .="</tr></table>";
				return $Admin_Construct;
				
			}else{
			$Admin_Construct .="<table cellpadding='0' cellspacing='0' width='100%'><tr>";
			$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[7]' border='0'>$Admin_Icons[7]<br />$Admin_Labels[7]</a></td>";
			$Admin_Construct .="<td id='ControlPanel_Icons'><a href='$Admin_Link[5]' border='0'>$Admin_Icons[5]<br />$Admin_Labels[5]</a></td>";
			$Admin_Construct .="</tr></table>";
			return $Admin_Construct;
			}
		
	}
	
	function Admin_Footer_Preferences()
	{
		if(USERADMIN == ADMIN)
		{
		global $Images_Dir;
		global $Pref_NewMembers;
		global $Pref_TotalMembers;
		
		$Pref_Icons = array();
		$Pref_Labels = array();
		$Pref_Link = array();
		$Pref_Query = array();
		
		$Pref_Icons[0] = "<Img id='ControlPanel_SubCat_Icon' src='../$Images_Dir/Admin/Members_20.png' border='0'>";
		$Pref_Icons[1] = "<Img id='ControlPanel_SubCat_Icon' src='../$Images_Dir/Admin/Members_20.png' border='0'>";
		$Pref_Icons[2] = "<Img id='ControlPanel_SubCat_Icon' src='../$Images_Dir/Admin/Homepage_20.png' border='0'>";
		
		$Pref_Labels[0] = "New Members";
		$Pref_Labels[1] = "Total Members";
		$Pref_Labels[2] = "Announcements";

		$Pref_Link[0] = "Sendpage.php?fetch=Members&id=1";
		$Pref_Link[1] = "Sendpage.php?fetch=Members&id=2";;
		$Pref_Link[2] = "Sendpage.php?fetch=Homepage";;
		
		$Pref_Query[0] = PREF_NEW_MEMBERS;
		$Pref_Query[1] = PREF_TOTAL_MEMBERS;
		$Pref_Query[2] = PREF_TOTAL_ANNOUNCEMENTS;
		
		
			define("GET_NEW_MEMBERS_ICON", $Pref_Icons[0]);
			define("GET_NEW_MEMBERS_LINK", $Pref_Link[0]);
			define("GET_NEW_MEMBERS_QUERY", $Pref_Query[0]);
			
			function Show_Pending_Members()
			{
				if(GET_NEW_MEMBERS_QUERY == 1)
				{
				return "<a href='".GET_NEW_MEMBERS_LINK."'>".GET_NEW_MEMBERS_ICON."".GET_NEW_MEMBERS_QUERY." Pending Account</a>";
				}elseif(GET_NEW_MEMBERS_QUERY >= 2)
				{
				return "<a href='".GET_NEW_MEMBERS_LINK."'>".GET_NEW_MEMBERS_ICON."".GET_NEW_MEMBERS_QUERY." Pending Accounts</a>";
				}
				
				
			}
			
		$Show_Pending_Members = Show_Pending_Members();
		
		$Pref_Construct .="<table cellpadding='0' cellspacing='0' width='100%'>";
		$Pref_Construct .="<tr><td id='ControlPanel_SubCat'>$Show_Pending_Members</td></tr>";
		$Pref_Construct .="<tr><td id='ControlPanel_SubCat'><a href='$Pref_Link[1]'>$Pref_Icons[1]$Pref_Query[1]&nbsp;$Pref_Labels[1]</a></td></tr>";
		$Pref_Construct .="<tr><td id='ControlPanel_SubCat'><a href='$Pref_Link[2]'>$Pref_Icons[2]$Pref_Query[2]&nbsp;$Pref_Labels[2]</a></td></tr>";
		$Pref_Construct .="</table>";
		return $Pref_Construct;
		}
	}

	
	function Admin_Members()
	{
	global $Datafeed_Dir;
	global $Images_Dir;
	
	$id = $_GET['id'];
	
			function Display_New_Members()
			{
				if(PREF_NEW_MEMBERS >= 1)
				{
				return '<a href=\'Sendpage.php?fetch=Members&id=1\' id=\'ControlPanel_SubCat\'>('.PREF_NEW_MEMBERS.') Pending Accounts</a>';
				}
			}
	
	$Construct .="<iframe name='iframe' height='290px' width='750px' frameborder='0' src='../$Datafeed_Dir/ControlPanel/Datafeed_cp_Members.php?id=$id' scrolling='no' border='0' allowtransparency='true'></iframe>";
	return $Construct;
	unset($Construct);
	}
	
	
	function Admin_Themes()
	{
	global $Datafeed_Dir;
	global $Images_Dir;
	$Construct .="<iframe name='iframe' height='290px' width='805px'frameborder='0' src='../$Datafeed_Dir/ControlPanel/Datafeed_cp_Themes.php' scrolling='auto' border='0' allowtransparency='true'></iframe>";
	return $Construct;
	unset($Construct);
	}
	
	
	function Admin_Preferences()
	{
	global $Datafeed_Dir;
	global $Images_Dir;
	$Construct .="<iframe name='iframe' height='290px' width='805px'frameborder='0' src='../$Datafeed_Dir/ControlPanel/Datafeed_cp_Preferences.php' scrolling='no' border='0' allowtransparency='true'></iframe>";
	return $Construct;
	unset($Construct);
	}
	
	
	function Admin_Homepage()
	{
	global $Datafeed_Dir;
	global $Images_Dir;
	$Construct .="<iframe name='iframe' height='290px' width='805px'frameborder='0' src='../$Datafeed_Dir/ControlPanel/Datafeed_cp_Homepage.php' scrolling='no' border='0' allowtransparency='true'></iframe>";
	return $Construct;
	unset($Construct);
	}
	
	function Admin_Links()
	{
	global $Datafeed_Dir;
	global $Images_Dir;
	$Construct .="<iframe name='iframe' height='290px' width='805px'frameborder='0' src='../$Datafeed_Dir/ControlPanel/Datafeed_cp_Links.php' scrolling='no' border='0' allowtransparency='true'></iframe>";
	return $Construct;
	unset($Construct);
	}
	
	function Admin_Pages()
	{
	global $Datafeed_Dir;
	global $Images_Dir;
	$Construct .="<iframe name='iframe' height='290px' width='805px'frameborder='0' src='../$Datafeed_Dir/ControlPanel/Datafeed_cp_Pages.php' scrolling='no' border='0' allowtransparency='true'></iframe>";
	return $Construct;
	unset($Construct);
	}
	
	function Admin_MySettings()
	{
	global $Datafeed_Dir;
	global $Images_Dir;
	$Construct .="<iframe name='iframe' height='290px' width='805px'frameborder='0' src='../$Datafeed_Dir/ControlPanel/Datafeed_cp_MySettings.php' scrolling='no' border='0' allowtransparency='true'></iframe>";
	return $Construct;
	unset($Construct);
	}
	
	Define("ADMIN_MEMBERS", Admin_Members());
	Define("ADMIN_ICONS", Admin_Icons());
	Define("ADMIN_THEMES",Admin_Themes());
	Define("ADMIN_PREFERENCES",Admin_Preferences());
	Define("ADMIN_HOMEPAGE", Admin_Homepage());
	Define("ADMIN_LINKS",Admin_Links());
	Define("ADMIN_PAGES",Admin_Pages());
	Define("ADMIN_MYSETTINGS", Admin_MySettings());
	Define("ADMIN_FOOTER_PREFERENCES", Admin_Footer_Preferences());

?>