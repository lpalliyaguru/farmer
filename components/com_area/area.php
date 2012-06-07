<?php
/*
 * importing relevant packages
 */
hImport("system.area.Area");
hImport("system.area.Employee");

/*
 * getting the GET call
 */
if(getParam("getAction")){
	$getAction=getParam("getAction");
	switch ($getAction){
		case 'add':
			addArea();
			break;
		case 'view':
			viewAreas();
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
		default:
			break;
	}
	
}
function addArea(){
	
	$exc=new ExcecutivePerson();
	$execs=$exc->getExecPersons();
	
	?>
	
	<form action="?page=com_area" method="post" onsubmit="return validateAreaform()" id="form-area">
	<table border="1">
		<tr>
			<td>Area Id</td>
			<td><input type="text" id="id-area-id" name="name-area-id"></td>
		</tr>
		<tr>
			<td>Area Name</td>
			<td><input type="text" id="id-area-name" name="name-area-name"></td>
		</tr>
		<tr>
			<td>Area Executive </td>
			<td><select name= "name-area-exec" id= "name-area-exec">
				<option selected="selected" value="-1">Select a executive</option>
				<?php 
				foreach ($execs as $temp){
					
					print "<option value='".$temp->getExecId()."'>";
					print $temp->getName();
					print "</option>";
				}
				?>
			
			</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Save Area">
				<input type="reset" value="Reset" >
				<input type="hidden" name="postAction" value="save" >
			</td>
		</tr>
	</table>
	</form>
	
	<?php 
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

function viewAreas(){
	$a=new Area();
	$areas=$a->getAll();
	$e=new ExcecutivePerson();
	print "<h3>Areas registered in the system </h3>";
	print "<table border='1'>";
	print "<tr><td>Area Id</td><td>Area Name</td><td>Executive</td></tr>";
	foreach ($areas as $temp){
		print "<tr>";
		print "<td>".$temp->getId()."</td>";
		print "<td>".$temp->getName()."</td>";
		$ex=$e->getExecPersonById($temp->getExecutive());
		print "<td>".$ex->getName()."</td>";
		print "</tr>";
	}
	print "</table>";
	
}







?>
