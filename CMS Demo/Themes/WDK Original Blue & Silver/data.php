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


  $Theme_name        = "WDK Original Blue & Silver";
  $Theme_version     = "1.0.0";
  $Theme_author		 = "Lee Tennant";
  $Theme_compatible  = "Dafsim WDK System";
  $Theme_readme      = "readme.txt";
  $Theme_Thumbnail	 = "Images/Thumbnail.jpg";
  $Theme_Stylesheet  = "Style.css";
  $Theme_Index		 = "index.php";
  $Theme_description = "WDK Original Blue & Silver theme, created to give you a sleek look. In addition to a insight into the functionality of website & dafnode communications.";
		

///////////////////////// WARNING!!!  - DO NOT EDIT  THIS INFORMATION ! /////////////////////////

	if(($Datafeed != true) && ($Admin != true))
	{
	Define("THEME_IMAGE", "".$Theme_Dir."/".THEME."/Images/");
	include("".$Theme_Dir."/".THEME."/".$Theme_Index."");
	
	}elseif($Admin == true){
	Define("THEME_IMAGE", "".WDK_Base."".$Theme_Dir."/".THEME."/Images/");
	include("".WDK_Base."".$Theme_Dir."/".THEME."/".$Theme_Index."");
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
?>