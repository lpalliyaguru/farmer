<?php
/*
 * importing relevant packages
 */
hImport("system.area.Area");
hImport("system.area.Employee");

import('HTML_renderer');
/*
 * getting the GET call
 */
if(getParam("getAction")){
	$getAction=getParam("getAction");
	switch ($getAction){
		case 'add':
			HTML_renderer::addArea();
			break;
		case 'view':
			HTML_renderer::viewAreas();
			break;
		case 'del':
			deleteArea();
			break;
		case 'edit':
			HTML_renderer::editArea();
			break;	
		default:
			break;
	}
	
}else{
	
	
}
/*
 * getting the POST call
 */


if(getParam("postAction")){
	$postAction=getParam("postAction");
	switch ($postAction){
		case 'save':
			saveArea($_POST);
			break;
		case 'update':
			updateArea($_POST);
			break;
		default:
			break;
	}
	
}

function saveArea($post){
	global $mainframe;
	$area=new Area();
	$area->setId($post['name-area-id']);
	$area->setName($post['name-area-name']);
	$area->setExecutive($post['name-area-exec']);
	if($area->saveArea($area)){
		//$mainframe->redirect("index.php?page=com_hello","area saved","SUCCESS");
		print "<p class='class-alert'><span></span>Area saved successfully!</p>";
	}else{
		print "<p class='class-error'><span></span>There was an error saving area data.Please try again.</p>";
	}
}



function deleteArea(){
	
	$areaId=getParam("id");
	$a=new Area();
	if($a->deleteArea($areaId)){
		//$mainframe->redirect("index.php?page=com_hello","area saved","SUCCESS");
		print "<p class='class-alert'><span></span>Area deleted successfully!</p>";
	}else{
		print "<p class='class-error'><span></span>There was an error deletsing area data.Please try again.</p>";
	}
	
}



function updateArea($post){
	

	$area=new Area();
	$area->setId($post['update-area-id']);
	$area->setName($post['name-area-name']);
	$area->setExecutive($post['name-area-exec']);
	

	if($area->deleteArea($post['update-area-id'])){
		if($area->saveArea($area)){
			//$mainframe->redirect("index.php?page=com_hello","area saved","SUCCESS");
			print "<p class='class-alert'><span></span>Area updated successfully!</p>";
		}else{
			print "<p class='class-error'><span></span>There was an error updating area data.Please try again.</p>";
		}
	}
	
	
}


?>
