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
// Installation Errors 
//=======================================================
function ERROR_FieldBlank(){
echo "<div id='Error'><img src='../Images/Error_Icon.jpg'>You left a required field blank!</div>";}
		
function ERROR_PasswordMismatch(){
echo "<div id='Error'><img src='../Images/Error_Icon.jpg'>Your mysql passwords do not match!</div>";}

function ERROR_UnableToConnectMysql(){
echo "<div id='Error'><img src='../Images/Error_Icon.jpg'>Unable to connect to mysql!</div>";}

function ERROR_UnableToConnectMysql_db(){
echo "<div id='Error'><img src='../Images/Error_Icon.jpg'>Unable to access mysql database!</div>";}

function ERROR_AdminPasswordMismatch(){
echo "<div id='Error'><img src='../Images/Error_Icon.jpg'>Your admin account passwords do not match!</div>";}

function ERROR_UnableToConnectDafnode(){
echo "<div id='Error'><img src='../Images/Error_Icon.jpg'>Unable to connect to dafnode server!</div>";}

//=======================================================
// Mysql Connection Errors 
//=======================================================
function ERROR_MysqlUnabletoConnectMysql(){
echo "<div id='Error'>Unable to connect to mysql!</div>";}

function ERROR_MysqlUnabletoSelectMysqlDB(){
echo "<div id='Error'>Unable to access mysql database!</div>";}


// ======================================================
// Datafeed CP Error Handles
// ======================================================

	// ========================
	//  Datafeed_Links
	// ========================
	function ERROR_CP_Links_fieldblank(){
	echo "<div id='Error'>You left a field blank!</div>";}

	// ========================
	//  Datafeed CP Homepage
	// ========================
	function ERROR_CP_Homepage_fieldblank(){
	echo "<div id='Error'>You left a field blank!</div>";}
			
	// ========================
	//  Datafeed_Edite_Create
	// ========================
	function ERROR_CP_Edite_Create_fieldblank(){
	echo "<div id='Error'>You left a field blank!</div>";}
		
//=======================================================
// Login Errors
//=======================================================
function LOGIN_FAILED(){
return "Failed to login!";}

function LOGIN_NOTACTIVE(){
return "Your account has not been activated. Please check back soon.";}
			
//=======================================================
// Control Panel Errors
//=======================================================
function ADMIN_NOACCESS(){
echo "<div id='Error'>You do not have access to view this area!</div>";}
			
//=======================================================	
// Check for core files 
//=======================================================
function CheckFiles(){

	global $Admin_Dir;
	global $Datafeed_Dir;
	global $Function_Dir;
	global $Images_Dir;
	global $Stylesheet_Dir;
	global $Theme_Dir;
	global $Installation_Dir;
	
	if(file_exists($Installation_Dir))
	echo "<div id='Error'><font size=2>&nbsp;WARNING! - <i>Remove the '".$Installation_Dir."' folder!</i></font></div>";
	
	if(!file_exists($Admin_Dir))
	die("<b>ERROR</b> Unable to locate your Admin folder!");
	
	if(!file_exists($Datafeed_Dir))
	die("<b>ERROR</b> Unable to locate your Datafeed folder!");
	
	if(!file_exists($Function_Dir))
	die("<b>ERROR</b> Unable to locate your Functions folder!");
	
	if(!file_exists($Images_Dir))
	die("<b>ERROR</b> Unable to locate your Images folder!");
	
	if(!file_exists($Stylesheet_Dir))
	die("<b>ERROR</b> Unable to locate your Stylesheet folder!");
	
	if(!file_exists($Theme_Dir))
	die("<b>ERROR</b> Unable to locate your theme folder!");		
	
	if(!file_exists("".$Theme_Dir."/".THEME.""))
	die("<b>ERROR</b> Unable to locate your theme: <b>".THEME."</b>!");
}

//=======================================================
// Check Themes
//=======================================================
function CheckThemeFiles()
{	
	global $Theme_Dir;
	global $Theme_Folder;
	global $Theme_name;
	global $Theme_version;
	global $Theme_author;	
	global $Theme_compatible;
	global $Theme_readme;
	global $Theme_Thumbnail;
	global $Theme_Stylesheet;
	global $Theme_Index;
	global $Theme_description;

		// Check if Control Panel Folder exists
		if(!file_exists("../../".$Theme_Dir."/".$Theme_Folder."/ControlPanel")){
		echo "<div id='Error'>Unable to locate your control panel folder on theme <i>".$Theme_Folder."</i>!</div>";
		die;
		}
		
		// Check if Image Folder exists
		if(!file_exists("../../".$Theme_Dir."/".$Theme_Folder."/Images")){
		echo "<div id='Error'>Unable to locate your image folder on theme <i>".$Theme_Folder."</i>!</div>";
		die;
		}
		
		// Check if stylesheet file exists
		if(!file_exists("../../".$Theme_Dir."/".$Theme_Folder."/Style.css")){
		echo "<div id='Error'>Unable to locate your Styles.css file on theme <i>".$Theme_Folder."</i>!</div>";
		die;
		}
		
		// Check if stylesheet file exists
		if(!file_exists("../../".$Theme_Dir."/".$Theme_Folder."/data.php")){
		echo "<div id='Error'>Unable to locate your data.php file on theme <i>".$Theme_Folder."</i>!</div>";
		die;
		}
		
		// Check if stylesheet file exists
		if(!file_exists("../../".$Theme_Dir."/".$Theme_Folder."/head.php")){
		echo "<div id='Error'>Unable to locate your head.php file on theme <i>".$Theme_Folder."</i>!</div>";
		die;
		}
		
		// Check if Admin Template file exists
		if(!file_exists("../../".$Theme_Dir."/".$Theme_Folder."/ControlPanel/Admin_Template.php")){
		echo "<div id='Error'>Unable to locate your Admin_Template.php file on theme <i>".$Theme_Folder."</i>!</div>";
		die;
		}
		
		// Check if Admin file exists
		if(!file_exists("../../".$Theme_Dir."/".$Theme_Folder."/ControlPanel/Admin.php")){
		echo "<div id='Error'>Unable to locate your Admin.php file on theme <i>".$Theme_Folder."</i>!</div>";
		die;
		}
		
		
		// Check if themeset file exists
		if(!file_exists("../../".$Theme_Dir."/".$Theme_Folder."/index.php")){
		echo "<div id='Error'>Unable to locate your index.php file on theme <i>".$Theme_Folder."</i>!</div>";
		die;
		}
						
			// Check Variable
			if(!$Theme_name){
			echo "<div id='Error'>Variable Theme_name is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
		
			// Check Variable
			if(!$Theme_version){
			echo "<div id='Error'>Variable Theme_version is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
			
			// Check Variable
			if(!$Theme_author){
			echo "<div id='Error'>Variable Theme_author is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
			
			// Check Variable
			if(!$Theme_compatible){
			echo "<div id='Error'>Variable Theme_compatible is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
							
			// Check Variable
			if(!$Theme_readme){
			echo "<div id='Error'>Variable Theme_readme is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
			
			// Check Variable
			if(!$Theme_Thumbnail){
			echo "<div id='Error'>Variable Theme_Thumbnail is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
			
			// Check Variable
			if(!$Theme_Stylesheet){
			echo "<div id='Error'>Variable Theme_Stylesheet is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
			
			// Check Variable
			if(!$Theme_Index){
			echo "<div id='Error'>Variable Theme_Index is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
			
			// Check Variable
			if(!$Theme_Index){
			echo "<div id='Error'>Variable Theme_Index is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
			
			// Check Variable
			if(!$Theme_description){
			echo "<div id='Error'>Variable Theme_description is not set on data.php. Theme <i>".$Theme_Folder."</i>!</div>";
			die;
			}
}
		
?>