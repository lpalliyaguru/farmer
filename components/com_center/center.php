<?php

hImport("system.area.Center");
hImport("system.area.Employee");

if(getParam("getAction")){
	$getAction=getParam("getAction");
	switch ($getAction){
		case 'add':
			addCenter();
			break;
		case 'view':
			viewCenters();
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
		default:
			break;
	}
	
}
function addCenter(){
	
	$exc=new SupervisorPerson();
	$execs=$exc->getSupPersons();
	
	$area=new Area();
	$areas=$area->getAll();
	?>
	
	<form action="?page=com_center" method="post" onsubmit="return validateCenterform()" id="form-center">
	<table border="1">
		<tr>
			<td>Center Id</td>
			<td><input type="text" id="id-center-id" name="name-center-id"></td>
		</tr>
		<tr>
			<td>Center Name</td>
			<td><input type="text" id="id-center-name" name="name-center-name"></td>
		</tr>
		<tr>
			<td>Related Area </td>
			<td><select name= "name-center-area" id= "name-center-area">
				<option selected="selected" value="-1">Select an area</option>
				<?php 
				foreach ($areas as $tem){
					
					print "<option value='".$tem->getId()."'>";
					print $tem->getName();
					print "</option>";
				}
				?>
			
			</select>
			</td>
		</tr>
		<tr>
			<td>Center Supervisor </td>
			<td><select name= "name-center-exec" id= "name-center-exec">
				<option selected="selected" value="-1">Select a executive</option>
				<?php 
				foreach ($execs as $temp){
					
					print "<option value='".$temp->getSupId()."'>";
					print $temp->getName();
					print "</option>";
				}
				?>
			
			</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Save Center">
				<input type="reset" value="Reset" >
				<input type="hidden" name="postAction" value="save" >
			</td>
		</tr>
	</table>
	</form>
	
	<?php 
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

function viewCenters(){
	$c=new Center();
	$centers=$c->getAll();
	$a=new Area();
	$e=new SupervisorPerson();
	print "<h3>Centers registered in the system </h3>";
	print "<table border='1'>";
	print "<tr><td>Center Id</td><td>Center Name</td><td>Related Area</td><td>Supervisor</td></tr>";
	foreach ($centers as  $temp){
		print "<tr>";
		print "<td>".$temp->getId()."</td>";
		print "<td>".$temp->getName()."</td>";
		$area=$a->getAreaById($temp->getAreaId());
		print "<td>".$area->getName()."</td>";
		$sup=$e->getSupPersonById($temp->getSupervisor());
		print "<td>".$sup->getName()."</td>";
		print "</tr>";
	}
	print "</table>";
	
}

?>