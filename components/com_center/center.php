<?php

hImport("system.area.Center");
hImport("system.area.Employee");
import("HTML_renderer");
if(getParam("getAction")){
	$getAction=getParam("getAction");
	switch ($getAction){
		case 'add':
			HTML_renderer::addCenter();
			break;
		case 'view':
			HTML_renderer::viewCenters();
			break;
		case 'del':
			HTML_renderer::deleteCenter();
			break;
		case 'edit':
			HTML_renderer::editCenter();
			break;
		default:
			break;
	}
	
}else{
	
	
}

/*
 * 
 * getting post call
 */


if(getParam("postAction")){
	$postAction=getParam("postAction");
	switch ($postAction){
		case 'save':
			saveCenter($_POST);
			break;
		case 'update':
			updateCenter($_POST);
			break;
		default:
			break;
	}
	
}


function saveCenter($post){
	
	$center=new Center();
	$center->setId($post['name-center-id']);
	$center->setName($post['name-center-name']);
	$center->setSupervisor($post['name-center-exec']);
	$center->setAreaId($post['name-center-area']);
	
	if($center->saveCenter($center)){
		//$mainframe->redirect("index.php?page=com_hello","area saved","SUCCESS");
		print "<p class='class-alert'><span></span>Center saved successfully!</p>";
	}else{
		print "<p class='class-error'><span></span>There was an error saving center data.Please try again.</p>";
	}
}

function updateCenter($post){
	$center=new Center();
	$center->setId($post['update-center-form']);
	$center->setName($post['name-center-name']);
	$center->setSupervisor($post['name-center-exec']);
	$center->setAreaId($post['name-center-area']);
	
	if($center->deleteCenter($post['update-center-form'])){
		if($center->saveCenter($center)){
			print "<p class='class-alert'><span></span>Center updated successfully!</p>";
		}else{
			print "<p class='class-error'><span></span>There was an error saving center data.Please try again.</p>";
		}
		
	}
	
}

?>