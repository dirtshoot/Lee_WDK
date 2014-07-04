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


//=======================================================
// Installation Form Post
//=======================================================
function InstallationForm_Post()
{

	$Mysql_Username =			$_POST['Mysql_Username'];
	$Mysql_Password = 			$_POST['Mysql_Password'];
	$Mysql_Confirm_Password =	$_POST['Mysql_Confirm_Password'];
	$Mysql_Database = 			$_POST['Mysql_Database'];
	$Mysql_Address = 			$_POST['Mysql_Address'];
	$Admin_Fname = 				$_POST['Admin_Fname'];
	$Admin_Lname = 				$_POST['Admin_Lname'];
	$Admin_City = 				$_POST['Admin_City'];
	$Admin_Username =			$_POST['Admin_Username'];
	$Admin_Password =			$_POST['Admin_Password'];
	$Admin_Confirm_Password =	$_POST['Admin_Confirm_Password'];
	$Admin_Email =				$_POST['Admin_Email'];
	$Dafnode_Address = 			$_POST['Dafnode_Address'];
	$Dafnode_Port = 			$_POST['Dafnode_Port'];
	// Check form Empty
	if((Empty($Mysql_Username)) || (Empty($Mysql_Password)) || (Empty($Mysql_Confirm_Password)) || (Empty($Mysql_Address)) || (Empty($Mysql_Database)) || (Empty($Admin_Username)) || (Empty($Admin_Password)) || (Empty($Admin_Confirm_Password)) || (Empty($Admin_Email)) || (Empty($Admin_Fname)) || (Empty($Admin_Lname)) || (Empty($Admin_City)) || (Empty($Dafnode_Address)) || (Empty($Dafnode_Port)))
	{
	ERROR_FieldBlank();
	}
	
	//=======================================================
	// ========== MYSQL ERROR HANDLE ======= (Close Mysql)
	//=======================================================
	if($Mysql_Password != $Mysql_Confirm_Password)
	{
	ERROR_PasswordMismatch();
	}else{
		$MysqlConnection = @mysql_connect($Mysql_Address, $Mysql_Username, $Mysql_Password);
			if (!$MysqlConnection)
			{
			ERROR_UnableToConnectMysql();
			}else{
				$Database = mysql_select_db($Mysql_Database, $MysqlConnection);
				if(!$Database)
				ERROR_UnableToConnectMysql_db();
			}
	}

	//=======================================================
	// ========== Admin ERROR HANDLE =======
	//=======================================================
	if($Admin_Password != $Admin_Confirm_Password)
	{
	ERROR_AdminPasswordMismatch();
	}
	
	//=======================================================
	// ========== Dafnode ERROR HANDLE ======= (Close Fsocket)
	//=======================================================
	$DafnodeConnection = @fsockopen($Dafnode_Address, $Dafnode_Port, $errno, $errstr, $timeout);
	if(!$DafnodeConnection)
	ERROR_UnableToConnectDafnode();
	
	
	?>
	<form method="post" action="../Installation/Index.php" name="InstallationForm">
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td id="Menu_Header">Step 1. Mysql Configuration</td>
		</tr>
		</table>
		
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td id="Menu_Content">Mysql Username:</td>
			<td><input type="text" id="Menu_inputbox" name="Mysql_Username" value="<? echo $Mysql_Username; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Mysql Password:</td>
			<td><input type="password" id="Menu_inputbox" name="Mysql_Password" value="<? echo $Mysql_Password; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Confirm Password:</td>
			<td><input type="password" id="Menu_inputbox" name="Mysql_Confirm_Password" value="<? echo $Mysql_Confirm_Password; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Mysql Database:</td>
			<td><input type="text" id="Menu_inputbox" name="Mysql_Database" value="<? echo $Mysql_Database; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Mysql Address:</td>
			<td><input type="text" id="Menu_inputbox" name="Mysql_Address" value="localhost"></td>
			</tr>
			</table>
		
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td id="Menu_Header">Step 2. Admin Account Configuration</td>
		</tr>
		</table>
		
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td id="Menu_Content">Admin Username:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_Username" value="<? echo $Admin_Username; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin Password:</td>
			<td><input type="password" id="Menu_inputbox" name="Admin_Password" value="<? echo $Admin_Password; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Confirm Password:</td>
			<td><input type="password" id="Menu_inputbox" name="Admin_Confirm_Password" value="<? echo $Admin_Confirm_Password; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin Firstname:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_Fname" value="<? echo $Admin_Fname; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin Lastname:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_Lname" value="<? echo $Admin_Lname; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin City:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_City" value="<? echo $Admin_City; ?>"></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin Email:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_Email" value="<? echo $Admin_Email; ?>"></td>
			</tr>
			</table>
			
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td id="Menu_Header">Step 3. DafNode Configuration</td>
		</tr>
		</table>
		
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td id="Menu_Content">Dafnode Address:</td>
			<td><input type="text" id="Menu_inputbox" name="Dafnode_Address" value=""></td>
			</tr>
			</table>
				<table cellpadding="0" cellspacing="0">
				<tr>
				<td id="Menu_Content_Long">Location where your dafnode server is running.</td>
				</tr>
				</table>
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td id="Menu_Content">Dafnode Port:</td>
			<td><input type="text" id="Menu_inputbox" name="Dafnode_Port" value=""></td>
			</tr>
			</table>
						
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td><br></br><input type="Submit" id="Menu_inputbox" name="Submit" value="Continue Installation"></td>
		</tr>
		</table>
	</form>
	<?
}


//=======================================================
// Installation Form
//=======================================================
function InstallationForm()
{
?>
<form method="post" action="../Installation/Index.php" name="InstallationForm">
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td id="Menu_Header">Step 1. Mysql Configuration</td>
		</tr>
		</table>
		
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td id="Menu_Content">Mysql Username:</td>
			<td><input type="text" id="Menu_inputbox" name="Mysql_Username" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Mysql Password:</td>
			<td><input type="password" id="Menu_inputbox" name="Mysql_Password" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Confirm Password:</td>
			<td><input type="password" id="Menu_inputbox" name="Mysql_Confirm_Password" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Mysql Database:</td>
			<td><input type="text" id="Menu_inputbox" name="Mysql_Database" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Mysql Address:</td>
			<td><input type="text" id="Menu_inputbox" name="Mysql_Address" value="localhost"></td>
			</tr>
			</table>
		
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td id="Menu_Header">Step 2. Admin Account Configuration</td>
		</tr>
		</table>
		
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td id="Menu_Content">Admin Username:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_Username" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin Password:</td>
			<td><input type="password" id="Menu_inputbox" name="Admin_Password" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Confirm Password:</td>
			<td><input type="password" id="Menu_inputbox" name="Admin_Confirm_Password" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin Firstname:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_Fname" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin Lastname:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_Lname" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin City:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_City" value=""></td>
			</tr>
			
			<tr>
			<td id="Menu_Content">Admin Email:</td>
			<td><input type="text" id="Menu_inputbox" name="Admin_Email" value=""></td>
			</tr>
			</table>
			<table cellpadding="0" cellspacing="0">
			
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td id="Menu_Header">Step 3. DafNode Configuration</td>
		</tr>
		</table>
		
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td id="Menu_Content">Dafnode Address:</td>
			<td><input type="text" id="Menu_inputbox" name="Dafnode_Address" value=""></td>
			</tr>
			</table>
				<table cellpadding="0" cellspacing="0">
				<tr>
				<td id="Menu_Content_Long">Location where your dafnode server is running.</td>
				</tr>
				</table>	
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td id="Menu_Content">Dafnode Port:</td>
			<td><input type="text" id="Menu_inputbox" name="Dafnode_Port" value=""></td>
			</tr>
			</table>
							
		
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td><br></br><input type="Submit" id="Menu_inputbox" name="Submit" value="Continue Installation"></td>
		</tr>
		</table>
</form>
<?
}

//=======================================================
// Installation Footer
//=======================================================
Function InstallationFooter()
{
?>
<div id="Installation_Headline">
<b>WWW.DAFSIM.COM</b>							<br />
Copyright © DAFSIM by Karim BENNEGADI 2004-2009	<br />
Products, brands and trademarks are property of their respective owners/companies
</div>
<?
}
?>