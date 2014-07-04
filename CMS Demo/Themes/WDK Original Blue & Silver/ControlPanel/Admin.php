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

$Page_Title = "WDK - Control Panel";
$Page_Content = '
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td id="ControlPanel_header">
			<b>Welcome back:</b> '.USERNAME.'
		</td>
		</tr>
		
			<tr>
			<td id="ControlPanel_Body">
				<div id="ControlPanel_Icon_Wapper">
				'.ADMIN_ICONS.'
				</div>
			</td>
			</tr>
			
				<tr>
				<td id="ControlPanel_footer">
					'.ADMIN_FOOTER_PREFERENCES.'
				</td>
				</tr>
		</table>
';
?>