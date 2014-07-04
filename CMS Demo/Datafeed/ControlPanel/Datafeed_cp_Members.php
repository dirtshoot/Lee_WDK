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
	$Action = $_GET['action'];
	$check_id = $_GET['id'];

		if(USERADMIN == ADMIN)
		{
		
			?>
			<html>
			<head>
			<TITLE><?php echo PAGE_TITLE; ?></TITLE>
			<link href="../../<? echo $Theme_Dir;echo "/".THEME;echo "/".$Theme_Stylesheet; ?>" rel="stylesheet" type="text/css">
			</head>
			<body id="ControlPanel">
				<table><tr><td id='Spacer'></td><tr></table>
				<table width="100%">
				<tr>
				<td id="ControlPanel_Row_Header">ID</td>
				<td id="ControlPanel_Row_Header">Status</td>
				<td id="ControlPanel_Row_Header">Username</td>
				<td id="ControlPanel_Row_Header">Email</td>
				<td id="ControlPanel_Row_Header">Task</td>
				</tr>
					<?
					if($check_id == "1")
					{
						while($Mysql_Admin = mysql_fetch_array(ADMIN_MEMBERS_NEW))
						{
							?>
							<tr>
							<td id="ControlPanel_Row"><? echo $Mysql_Admin['User_id'];?></td>
								<? 
								if($Mysql_Admin['User_Status'] == 0)
								echo "<td id='ControlPanel_Row_Active'>New Member</td>";
								elseif(($Mysql_Admin['User_Status'] == 1) && ($Mysql_Admin['User_Admin'] == 1))
								echo "<td id='ControlPanel_Row'>Administrator</td>";
								elseif($Mysql_Admin['User_Status'] == 1)
								echo "<td id='ControlPanel_Row'>Member</td>";
								?>
							</td>
							<td id="ControlPanel_Row"><? echo $Mysql_Admin['User_Name']; ?></td>
							<td id="ControlPanel_Row"><? echo $Mysql_Admin['User_Email']; ?></td>
							<td id="ControlPanel_Row">
								<select name='MemberTask'>
								<option value=''>Select Task</option>
								
									<? if($Mysql_Admin['User_Status'] == 0){
									?><option value=''>Activate Account</option>
									<option value=''>Remove Account</option><?
									}else{
									
										if($Mysql_Admin['User_Status'] == 1){
										?><option value=''>Remove Admin</option><?
										}else{
										?><option value=''>Make Admin</option><?}?>
										
										<option value=''>View Profile</option>
										<option value=''>Update Account</option>
										<option value=''>Remove Account</option>
									<?}?>
								</select>
							</td>
							</tr>
							<?
						}
					}else{
						while($Mysql_Admin = mysql_fetch_array(ADMIN_MEMBERS_OLD))
						{
							?>
							<tr>
							<td id="ControlPanel_Row"><? echo $Mysql_Admin['User_id'];?></td>
							<? 
							if($Mysql_Admin['User_Status'] == 0)
							echo "<td id='ControlPanel_Row_Active'>New Member</td>";
							elseif(($Mysql_Admin['User_Status'] == 1) && ($Mysql_Admin['User_Admin'] == 1))
							echo "<td id='ControlPanel_Row'>Administrator</td>";
							elseif($Mysql_Admin['User_Status'] == 1)
							echo "<td id='ControlPanel_Row'>Member</td>";
							?>
							</td>
							<td id="ControlPanel_Row"><? echo $Mysql_Admin['User_Name']; ?></td>
							<td id="ControlPanel_Row"><? echo $Mysql_Admin['User_Email']; ?></td>
							<td id="ControlPanel_Row">
								<select name='MemberTask'>
								<option value=''>Select Task</option>
									<? if($Mysql_Admin['User_Status'] == 0){
									?><option value=''>Activate Account</option>
									<option value=''>Remove Account</option><?
									}else{
									
										if($Mysql_Admin['User_Status'] == 1){
										?><option value=''>Remove Admin</option><?
										}else{
										?><option value=''>Make Admin</option><?}?>
										
										<option value='ViewProfile'>View Profile</option>
										<option value=''>Update Account</option>
										<option value=''>Remove Account</option>
									<?}?>
								</select>
							</td>
							</tr>
							<?
						}
					}
					?>
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
