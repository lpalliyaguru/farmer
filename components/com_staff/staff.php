<?php
hImport("core.user.HUser");

import("HTML_renderer");
/*
 * checking get action
 */
if($action=getParam("getAction")){
	switch ($action){
		case 'adduser':
			HTML_renderer::addUser();
			break;
		case 'view':
			HTML_renderer::viewUsers();
			break;
		case 'edit':
			HTML_renderer::editUser();
			break;
		case 'del':
			deleteUser();
			break;
		case 'addExec':
			HTML_renderer::addExec();
			break;
	}
}

/*
 * setting post action 
 */
if($action=getParam("postAction")){
	switch($action){
		case "saveuser":
			saveUser($_POST);
			break;
		case "updateuser":
			updateUser($_POST);
			break;
		
		
	}
	
}


function saveUser($post){
	$user=new HUser();
	$upload="images/avatars/";
	
	$user->setUsername($post['name-user-uname']);
	$user->setUserType($post['name-user-type']);
	$user->setFname($post['name-user-fname']);
	$user->setLname($post['name-user-lname']);
	$p=$post['name-user-password'];
	$user->setPassword(md5($p));
	
	$user->setOfficeCode("");	
	$ext=array_pop(explode(".", $_FILES['name-user-avatar']['name']));
	$filename=$user->getUsername().".".$ext;
	$user->setAvatar($filename);
	if($user->saveUser($user)){
		move_uploaded_file($_FILES['name-user-avatar']['tmp_name'], $upload.$filename);
		print "<p class='class-alert'><span></span>User saved successfully!</p>";
		
	}else {
		print "<p class='class-error'><span></span>There was an error saving usesr data.Please try again.</p>";
	}
}

function updateUser($post){
	$user=new HUser();
	$upload="images/avatars/";
	$id=$post['update-user'];
	$real_user=$user->getUserById($id);
	
	if($user->deleteUser($id)){
		$user->setUsername($post['update-user']);
		$user->setUserType($post['name-user-type']);
		$user->setFname($post['name-user-fname']);
		$user->setLname($post['name-user-lname']);
		$p=$post['name-user-password'];
		$user->setPassword(md5($p));
		
		$user->setOfficeCode("");	
		
		if($_FILES['name-user-avatar']['name']){
			
			$ext=array_pop(explode(".", $_FILES['name-user-avatar']['name']));
			$filename=$user->getUsername().".".$ext;
			$user->setAvatar($filename);
			
		}else{
			
			
			$user->setAvatar($real_user->getAvatar());
			
		}
		if($user->saveUser($user)){
			if(isset($_FILES['name-user-avatar']['name'])){
			move_uploaded_file($_FILES['name-user-avatar']['tmp_name'], $upload.$filename);
			}
			print "<p class='class-alert'><span></span>User updated successfully!</p>";
			
		}else {
			print "<p class='class-error'><span></span>There was an error updating usesr data.Please try again.</p>";
		}
	}
	
}
function deleteUser(){
	
	$id=getParam('id');
	$user=new HUser();
	if($user->deleteUser($id)){
		print "<p class='class-alert'><span></span>User deleted successfully!</p>";
		
	}else {
		print "<p class='class-error'><span></span>There was an error deleting usesr data.Please try again.</p>";
	}
	
}



?>