<?php
session_start();
require_once 'includes/call.php';

hImport("support.login.HAuthenticator");
$logAuth=new HAuthenticator();


$username=getParam("username");
$password=getParam("password");

	

	$login=$logAuth->authUser($username, $password);
	if($login){
		session_regenerate_id();
		$logAuth->saveState($username);
		
	}else{
	
		$logAuth->wrongUser();
	}





?>