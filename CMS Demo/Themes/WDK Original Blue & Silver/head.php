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
//				
//                                      WARNING!!!  - DO NOT EDIT THIS FILE !
//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<head>
	<title><?php echo PAGE_TITLE; ?></title>
	
	<?if($Admin == true){
	?><link href="<? echo WDK_Base; ?><? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css"><?
	}else{
	?><link href="<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css"><?
	}?>

</head>