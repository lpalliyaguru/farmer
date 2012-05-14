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
		//$logAuth->saveState($username);
		
		
		$user=new HUser($username);
		$origin_user=$user->getUserById($username);
		
		$_SESSION['SESS_MEMBER_ID'] =$username;
		$_SESSION['SESS_FIRST_NAME'] = $origin_user->getFname();
		$_SESSION['SESS_LAST_NAME'] =$origin_user->getLname();
		$_SESSION['SESS_USERTYPE'] =$origin_user->getUserType();
		$_SESSION['SESS_USERAVATAR'] =$origin_user->getAvatar();
		session_write_close();
		
		header("location: index.php");
		exit();
	}else{
		die("wrong ");
	}





?>