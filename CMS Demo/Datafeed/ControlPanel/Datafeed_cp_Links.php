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

	session_start();
	if(!$_SESSION['myusername'])
	header("location: ../../");
			
	include("../../index_Data.php");
	include("../../".$Function_Dir."/Functions.php");
	MysqlConnection();
	MysqlQuery();
	$Datafeed = true;
	include("../../".$Theme_Dir."/".THEME."/data.php");
		
		if(USERADMIN == ADMIN)
		{

			// =========================================
			// Update Order
			// =========================================
			if(isset($_POST['Link_Order_Submit']))
			{
				$Loop = $_POST['Link_Counter'];
								
				while($Loop)
				{
					$Order = $_POST['Select'.$Loop.''];
					$Link_id = $_POST['id'.$Loop.''];
					
					$Loop--;
					Links_Update_Order($Order, $Link_id);
					
					if($Loop == 0)
					break;
				}
				?><meta http-equiv="refresh" content="0"><?
			}	
			
			// =========================================
			// Add New Link
			// =========================================
			if(isset($_POST['Link_Add_Submit']))
			{
				$Link_Name = $_POST['link_name'];
				$Link_url  = $_POST['link_url'];
				$Link_order = PREF_GET_LINK_NUM + 1;
				
				if((empty($Link_Name)) || ($Link_url == "http://www."))
				{
				ERROR_CP_Links_fieldblank();
				}else{				
				Add_Links($Link_Name, $Link_url, $Link_order);
				?><meta http-equiv="refresh" content="0"><?
				}
			}
			
			// =========================================
			// Update Link
			// =========================================
			if(isset($_POST['Link_Edit']))
			{

				$id = $_POST['link_id'];
				$lstat = $_POST['lstat'];
			}
			
			// =========================================
			// Remove Link
			// =========================================
			if(isset($_POST['Link_Del']))
			{
				$id = $_POST['link_id'];
				Del_Link($id);
			}

			?>
			<html>
			<head>
			<TITLE><?php echo PAGE_TITLE; ?></TITLE>
			<link href="../../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
			</head>
			<body id="ControlPanel">
			
				<table width="100%">
				<tr>
				<td valign="TOP" width="40%">
					
						<table width="100%">
						<tr>
						<td id="ControlPanel_Row_Header" style="width: 100px">Link Name</td>
						<td id="ControlPanel_Row_Header" style="width: 80px">Link Order</td>
						<td id="ControlPanel_Row_Header" style="width: 20px">Action</td>
						</tr>
							<?
							$link_counter = 1;
							while($link_row = mysql_fetch_array(PREF_GET_LINKS))
							{
								$link_id = $link_row['id'];
								$Page_Query = mysql_query("SELECT * FROM WDK_Pages WHERE link_id='$link_id'");
								$Page_Fetch = mysql_fetch_array($Page_Query);			
								$Page_link_id = $Page_Fetch['link_id'];

								if(empty($Page_link_id))
								$Page_link_id = 0;

								?>
								<tr>							
								<td id="ControlPanel_Row" style="width: 100px">
									<form action="<? $_SERVER['php_self'] ?>" method="POST" name="Link_Order_form<? echo $link_counter; ?>">
									<input type="hidden" name="lstat" value="2">
									<? echo $link_row['Link_Name']; ?>
								</td>
								<td id="ControlPanel_Row" style="width: 80px">
								
									<SELECT name="Select<? echo $link_counter;?>">								
									<?
									$Link_Order = $link_row['Link_Order'];
									$Link_Order_Loop = PREF_GET_LINK_NUM;
									while($Link_Order_Loop != 0)
									{
										?>
										<OPTION value="<?echo $Link_Order_Loop;?>" <? if($Link_Order_Loop == $link_row['Link_Order']) echo "SELECTED";?>>
										<? 
										if($Link_Order_Loop == $link_row['Link_Order']) 
										echo "Order: [".$Link_Order_Loop."]";
										else	
										echo $Link_Order_Loop;
										?>
										</OPTION>
										<?
									$Link_Order_Loop--;
									
									}
								?>
									</SELECT>
								
								</td>
								<td id="ControlPanel_Row" style="width: 40px;">
								
								<input type="hidden" name="link_id" value="<?php echo $link_row['id']; ?>">
								<? if($link_id != $Page_link_id){ ?>
								<input id="ControlPanel_Remove_Icon" type="Submit" value="" name="Link_Del" onClick="if(confirm('Please confirm you wish to remove \n <?php echo $link_row['Link_Name']; ?>'))return true;else return false;" title="Remove: <?php echo $link_row['Link_Name']; ?>"><?}?>
		
								<input id="ControlPanel_Edit_Icon" type="Submit" value="" name="Link_Edit"  title="Edit Link: <?php echo $link_row['Link_Name']; ?>">
								
								</td>
								</tr>
								<?
								?>
								<input type="hidden" name="id<? echo $link_counter; ?>" value="<? echo $link_row['id']; ?>">
								<input type="hidden" name="Link_Counter" value="<? echo PREF_GET_LINK_NUM; ?>">
								</form>
								<?
								$link_counter++;
							}
							?>
						</table>
						<input id="ControlPanel_Row_Header" type="Submit" Name="Link_Order_Submit"  value="Update Order">
					
				</td>	
				<td valign="TOP" width="60%">
				
						<?
						if(($lstat == 1) || (!$lstat))
						{
						?>
							<form action="<? $_SERVER['php_self'] ?>" method="POST" name="Link_Add_form">
							<table width="70%">
							<tr>
							<td id="ControlPanel_Row_Header">Add Additional Links</td>
							</tr>
							</table>
							
							<table width="70%">
							<tr>
							<td id="ControlPanel_Row" valign="top">Link Name:</td>
							<td id="ControlPanel_Row" valign="top"><input id="ControlPanel_header" style="border: 0px; background-color: transparent;" type="text" name="link_name" value=""  size="30"></td>
							</tr>
								
								<tr>
								<td id="ControlPanel_Row" valign="top">Target URL:</td>
								<td id="ControlPanel_Row" valign="top"><input id="ControlPanel_header" style="border: 0px; background-color: transparent;" type="text" name="link_url" value="http://www." size="30"></td>
								</tr>
								
									<tr>
									<td>
									<input type="Submit" Name="Link_Add_Submit" id="ControlPanel_Row_Header" value="Add Link">
									</td>
									</tr>
									
							</table>
							</form>
						<?
						}elseif($lstat == 2)
						{
							$Update_Link_Query = mysql_query("SELECT * FROM WDK_SiteLinks WHERE id='$id'");
							$Update_Link_Fetch = mysql_fetch_array($Update_Link_Query);
							$Update_Link_Name = $Update_Link_Fetch['Link_Name'];
							?>
							<form action="<? $_SERVER['php_self'] ?>" method="POST" name="Link_Update_form">
							<table width="70%">
							<tr>
							<td id="ControlPanel_Row_Header">Update Link: <? echo $Update_Link_Name; ?></td>
							</tr>
							</table>
							
							<table width="70%">
							<tr>
							<td id="ControlPanel_Row" valign="top">Link Name:</td>
							<td id="ControlPanel_Row" valign="top"><input id="ControlPanel_header" style="border: 0px; background-color: transparent;" type="text" name="update_link_name" value="<? echo $Update_Link_Name; ?>"  size="30"></td>
							</tr>
								
								
									<tr>
									<td>
									<input type="Submit" Name="Link_Update_Submit" id="ControlPanel_Row_Header" value="Update Link">
									</td>
									<td>
									<input type="hidden" name="lstat" value="1">
									<input type="Submit" Name="Link_Edit" id="ControlPanel_Row_Header" value="Cancel">
									</td>
									</tr>
									
							</table>
							</form>
						<?						
						}
						?>
					
				</td>
				</tr>
				</table>

			</body>
			</html>
			<?
		}else{
			?>
			<html>
			<head>
			<TITLE><?php echo PAGE_TITLE; ?></TITLE>
			<link href="../../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
			</head>
			<body id="ControlPanel">
			<?php ADMIN_NOACCESS(); ?>
			</body>
			</html>
			<?
		}

	Mysql_Close_Connection();

?>
