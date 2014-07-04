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
		
		
function SiteLinks()
{
	global $Datafeed_Dir;
	global $Admin_Dir;
	global $Admin;
	

	if($Admin == true)
	{	
		//=======================================================
		// Links for Inside Control Panels
		//=======================================================
		if(!$_SESSION['myusername'])
		header("location: ../");

		
			function getpage($Link_id)
			{

			return $Page_Active;
			}
			
		while($Link = mysql_fetch_array(PREF_GET_LINKS))
		{
		
			$Link_id = $Link['id'];
			$Link_Name = $Link['Link_Name'];
			$Link_Address = $Link['Link_Address'];
			$Link_check = substr("".$Link_Address."", 0, 7);
			
			$Page_Query = mysql_query("SELECT * FROM WDK_Pages WHERE link_id = '$Link_id'");
			$Page_Fetch = mysql_fetch_array($Page_Query);
			$Page_Active = $Page_Fetch['active'];
			$Page_Link_id = $Page_Fetch['link_id'];

				if(!$Page_Link_id)
				$Page_Link_id = 0;
				
				if(!$Page_Active)
				$Page_Active = 0;
				
				if(($Page_Active == 1) || ($Page_Link_id == 0))
				{
					?>
					<td id="Links">
					<table cellspacing="0" cellpadding="0" width="100%" height="100%">
					<tr>
					<td id="Link_text"><a href="
					<?
						if($Link_check == "http://")
						{
						echo $Link_Address;
						}else{
						echo WDK_Base; echo $Link_Address;
						}
					?>"><div id="Link_Spacer"><? echo $Link_Name; ?></div></a></td>
					</tr>
					</table>
					</td>
					<?	
				}
		}
			?>
			<td id="Links">
			<table cellspacing="0" cellpadding="0" width="100%" height="100%">
			<tr>
			<td id="Link_text"><a href="Admin.php"><div id="Link_Spacer">Control Panel</div></a></td>
			</tr>
			</table>
			</td>
			<?	
			
	}else{
	
		//=======================================================
		// Links outside Control Panel
		//=======================================================
		while($Link = mysql_fetch_array(PREF_GET_LINKS))
		{
			$Link_id = $Link['id'];
			$Link_Name = $Link['Link_Name'];
			$Link_Address = $Link['Link_Address'];
			
			$Page_Query = mysql_query("SELECT * FROM WDK_Pages WHERE link_id = '$Link_id'");
			$Page_Fetch = mysql_fetch_array($Page_Query);
			$Page_Active = $Page_Fetch['active'];
			$Page_Link_id = $Page_Fetch['link_id'];

				if(!$Page_Link_id)
				$Page_Link_id = 0;
				
				if(!$Page_Active)
				$Page_Active = 0;
				
				if(($Page_Active == 1) || ($Page_Link_id == 0))
				{
				?>
				<td id="Links">
				<table cellspacing="0" cellpadding="0" width="100%" height="100%">
				<tr>
				<td id="Link_text"><a href="<? echo $Link_Address; ?>"><div id="Link_Spacer"><? echo $Link_Name; ?></div></a></td>
				</tr>
				</table>
				</td>
				<?
				}
		}
		if(!$_SESSION['myusername']){
		?>
			<td id="Links">
			<table cellspacing="0" cellpadding="0" width="100%" height="100%">
			<tr>
			<td id="Link_Text"><a href="login.php"><div id="Link_Spacer">Login</div></a></td>
			</tr>
			</table>
			</td>
			
			<td id="Links">
			<table cellspacing="0" cellpadding="0" width="100%" height="100%">
			<tr>
			<td id="Link_Text"><a href="register.php"><div id="Link_Spacer">Register</div></a></td>
			</tr>
			</table>
			</td>
			<?
		}ELSE{
		?>
			<td id="Links">
			<table cellspacing="0" cellpadding="0" width="100%" height="100%">
			<tr><td id="Link_text"><a href="<? echo $Admin_Dir; ?>/Admin.php"><div id="Link_Spacer">Control Panel</div></a></td>
			</tr>
			</table>
			</td>
			<?
		}			
	}
}
?>