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
	
		if(isset($_POST['Page_Update_submit']))
		{
			$Page_id = $_POST['Page_id'];
			$Page_Name = $_POST['Page_Update_Page_Name'];
			$Page_Content = $_POST['Page_Update_Content'];
			$Page_Link_Name = $_POST['Page_Update_Link_Name'];
			$Page_Link_id = $_POST['Page_Link_id'];
			$Page_Active = $_POST['Page_Active'];
			
			if((empty($Page_id)) || (empty($Page_Name)) || (empty($Page_Content)) || (empty($Page_Link_Name)) ||	(empty($Page_Link_id)))
			{
			ERROR_CP_Edite_Create_fieldblank();
			}else{
			Update_Page($Page_id, $Page_Name, $Page_Content, $Page_Link_id, $Page_Link_Name, $Page_Active);
			?>
			<meta http-equiv="refresh" content="1; url=Datafeed_cp_Pages.php">
			<?
			}
			
		}
		
		if(isset($_POST['Page_Create_submit']))
		{	
			$Page_Name = $_POST['Page_Create_Page_Name'];
			$Page_Content = $_POST['Page_Create_Content'];
			$Page_Link_Name = $_POST['Page_Create_Link_Name'];
			$Page_Order = $_POST['Page_Create_Order'];
			$Page_Active = $_POST['Page_Active'];
			
			if((empty($Page_Name)) || (empty($Page_Content)) || (empty($Page_Link_Name)) || (empty($Page_Order)))
			{
			ERROR_CP_Edite_Create_fieldblank();
			}else{
			Add_Page($Page_Name, $Page_Content, $Page_Link_Name, $Page_Order, $Page_Active);
			?>
			<meta http-equiv="refresh" content="1; url=Datafeed_cp_Pages.php">
			<?
			}
		}
		
		$Page_pstat = $_GET['pstat'];
		// One = Create new page
		if($Page_pstat == "1")
		{
			?>
			<html>
			<head>
			<TITLE><?php echo PAGE_TITLE; ?></TITLE>
			<link href="../../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
			</head>
			<body id="ControlPanel">
				<table width="20%">
				<tr>
				<td id="ControlPanel_Row_Header">Create a New Page!</td>
				</tr>
				</table>
				<table cellspacing="0" cellpadding="0" width="100%">
				<tr>
				<td valign="top" align="left" width="70%">
					<form action="<? $_SERVER['php_self'] ?>" method="POST" name="Page_Create_form">					
					&nbsp;<textarea id="ControlPanel_Row" name="Page_Create_Content" rows="18" cols="100"></textarea>						
				</td>
				<td valign="top" align="right" width="30%">
					<table width="100%">
					<tr>
					<td width="50%" style="padding-top: 3px;"><table width="100%"><tr><td id="ControlPanel_Row" align="center">Page Name</td></tr></table></td>
					<td width="50%"><input id="ControlPanel_Row" type="text" name="Page_Create_Page_Name"></td>
					</tr>
						<tr>
						<td width="50%" style="padding-top: 3px;"><table width="100%"><tr><td id="ControlPanel_Row" align="center">Link Name</td></tr></table></td>
						<td width="50%"><input id="ControlPanel_Row" type="text" name="Page_Create_Link_Name"></td>
						</tr>
							<tr>
							<td width="50%" style="padding-top: 3px;"><table width="100%"><tr><td id="ControlPanel_Row" valign="top" align="center">Link Order</td></tr></table></td>
							<td valign="TOP" width="50%">

								<SELECT name="Page_Create_Order">								
								<?
								$Page_Link_Order = PREF_GET_LINK_NUM + 1;
								$Page_Link_Order_Loop = PREF_GET_LINK_NUM + 1;
								while($Page_Link_Order_Loop != 0) 
								{
								$Page_Link_Query = mysql_query("SELECT * FROM WDK_SiteLinks WHERE Link_Order = '$Page_Link_Order_Loop'");
								$Page_Link_Show = mysql_fetch_array($Page_Link_Query);
								
									?>
									<OPTION value="<?echo $Page_Link_Order_Loop;?>" id="ControlPanel_Row" <? if($Page_Link_Order_Loop == $Page_Link_Order) echo "SELECTED"; else echo "DISABLED";?>>
									<? 
									if($Page_Link_Order_Loop == $Page_Link_Order) 
									echo "".$Page_Link_Order_Loop." Available";
									else
									echo "".$Page_Link_Order_Loop." ".$Page_Link_Show['Link_Name']."";
									?>
									</OPTION>
									<?
								$Page_Link_Order_Loop--;
								}
								?>
								</SELECT>
							</td>
							</tr>
							<tr>
							<td width="50%" style="padding-top: 3px;"><table width="100%"><tr><td id="ControlPanel_Row" align="center">Page Active:</td></tr></table></td>
							<td width="50%"><input type="checkbox" name="Page_Active" value="1" checked></td>
							</tr>
						<tr>
						<td>
							&nbsp;<input id="ControlPanel_Row_Header" type="submit" name="Page_Create_submit" value="Create Page">
							</form>
							
						</td>
						</tr>
					</table>
				</form>
				</td>
				</tr>
				</table>
			</body>
			</html>
			<?
			
		// Two = Edit Page
		}elseif($Page_pstat == "2")
		{
		
			$Custom_Page_id = $_GET['cpid'];					
			$Custom_Page_Query = mysql_query("SELECT * FROM WDK_Pages WHERE id = '$Custom_Page_id'");
			$Custom_Page = mysql_fetch_array($Custom_Page_Query);
			
			$Custom_Link_id = $Custom_Page['link_id'];
			$Custom_Link_Page_Query = mysql_query("SELECT * FROM WDK_SiteLinks WHERE id = '$Custom_Link_id'");
			$Custom_Link_Page = mysql_fetch_array($Custom_Link_Page_Query);

		?>
			<html>
			<head>
			<TITLE><?php echo PAGE_TITLE; ?></TITLE>
			<link href="../../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
			</head>
			<body id="ControlPanel">
			
				<table width="20%">
				<tr>
				<td id="ControlPanel_Row_Header">Update Page!</td>
				</tr>
				</table>
				
				<table cellspacing="0" cellpadding="0" width="100%">
				<tr>
				<td valign="top" align="left" width="70%">
					<form action="<? $_SERVER['php_self'] ?>" method="POST" name="Page_Update_form">
					&nbsp;<textarea id="ControlPanel_Row" name="Page_Update_Content" rows="18" cols="100"><? echo $Custom_Page['Page_Content']; ?></textarea>						
				</td>
				<td valign="top" align="right" width="30%">

						<table width="100%">
						<tr>
						<td width="50%" style="padding-top: 3px;"><table width="100%"><tr><td id="ControlPanel_Row" align="center">Page Name</td></tr></table></td>
						<td width="50%"><input id="ControlPanel_Row" type="text" name="Page_Update_Page_Name" value="<? echo $Custom_Page['Page_Title']; ?>"></td>
						</tr>
							<tr>
							<td width="50%" style="padding-top: 3px;"><table width="100%"><tr><td id="ControlPanel_Row" align="center">Link Name</td></tr></table></td>
							<td width="50%"><input id="ControlPanel_Row" type="text" name="Page_Update_Link_Name" value="<? echo $Custom_Link_Page['Link_Name']; ?>"></td>
							</tr>
								<tr>
								<td width="50%" style="padding-top: 3px;"><table width="100%"><tr><td id="ControlPanel_Row" align="center">Page Active:</td></tr></table></td>
								<td width="50%"><input type="checkbox" name="Page_Active" value="1" <? if($Custom_Page['active'] == 1){ ?>  checked<? } ?> ></td>
								</tr>
								
								<tr>
								<td>
								<input type="hidden" name="Page_id" value="<? echo $Custom_Page_id; ?>">
								<input type="hidden" name="Page_Link_id" value="<? echo $Custom_Link_id; ?>">
								&nbsp;<input id="ControlPanel_Row_Header" type="submit" name="Page_Update_submit" value="Update Page">
								</form>
								</td>
								</tr>
						</table>
						
						
				</form>
				</td>
				</tr>
				</table>
			</body>
			</html>
			<?
		
		}
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
