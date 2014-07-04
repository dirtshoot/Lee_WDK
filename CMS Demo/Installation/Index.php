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
	
?>
<html>
<head>
<link href="../<?php echo $Stylesheet_Dir; ?>/Installation.css" rel="stylesheet" type="text/css">
</head>
<body>

	<img src="../Images/Logo-Installation.jpg">
	<table width="700px" style="padding-bottom: 50px;">
	<tr>
	<td id="Installation_Headline">
		Welcome to the Installation Wizard. Below you will find a vast number of required information.
		If you are not sure about some of the required information, Fill free to contact us for more information. Also read the
		"WDK How To" for more detailed information. You will need all the information as requested below, before we can proceed. 
		<p>
		Please note: Your dafnode server will need to be online, So if you have not yet setup your dafnode server. Please do so before 
		proceeding with the installation wizard.
	</td>
	</tr>
	</table>
	
	<?php if(isset($_POST['Submit']))
	{
	?>
		<table cellpadding="0" cellspacing="0" width="700px">
		<tr>
		<td id="Installation_M_Top";>
		</td>
		</tr>
		
		<tr>
		<td id="Installation_M_Center">
		<?php InstallationForm_Post(); ?>
		
		</td>
		</tr>
		
		<tr>
		<td id="Installation_M_Bottom">
		</td>
		</tr>
		</table>
	<?
	}else{
	?>
		<table cellpadding="0" cellspacing="0" width="700px">
		<tr>
		<td id="Installation_M_Top";>
		</td>
		</tr>
		
		<tr>
		<td id="Installation_M_Center">
		<?php InstallationForm(); ?>
		
		</td>
		</tr>
		
		<tr>
		<td id="Installation_M_Bottom">
		</td>
		</tr>
		</table> 
	<?}?>
		<?php InstallationFooter(); ?>
</body>
</html>