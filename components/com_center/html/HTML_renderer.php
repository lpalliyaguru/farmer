<?php
class HTML_renderer{


	function addCenter(){

		$exc=new SupervisorPerson();
		$execs=$exc->getSupPersons();

		$area=new Area();
		$areas=$area->getAll();
		?>

<form action="?page=com_center" method="post"
	onsubmit="return validateCenterform()" id="form-center">
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
			<td>Related Area</td>
			<td><select name="name-center-area" id="name-center-area">
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
			<td>Center Supervisor</td>
			<td><select name="name-center-exec" id="name-center-exec">
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
			<td colspan="2"><input type="submit" value="Save Center"> <input
				type="reset" value="Reset"> <input type="hidden" name="postAction"
				value="save">
			</td>
		</tr>
	</table>
</form>

					<?php
	}

	function viewCenters(){
		$c=new Center();
		$centers=$c->getAll();
		if($centers){
			$a=new Area();
			$e=new SupervisorPerson();
			print "<h3>Centers registered in the system </h3>";
			print "<table border='1'>";
			print "<tr><td>Center Id</td><td>Center Name</td><td>Related Area</td><td>Supervisor</td></tr>";
			foreach ($centers as  $temp){
				print "<tr>";
				print "<td>".$temp->getId()."</td>";
				print "<td>".$temp->getName()."</td>";
				if($area=$a->getAreaById($temp->getAreaId())){
					print "<td>".$area->getName()."</td>";
				}else{
					print "<td></td>";
				}


				$sup=$e->getSupPersonById($temp->getSupervisor());
				print "<td>".$sup->getName()."</td>";
				print "<td><a href='index.php?page=com_center&getAction=edit&id=".$temp->getId()."' >Edit</a></td>";
				print "<td><a href='index.php?page=com_center&getAction=del&id=".$temp->getId()."' onclick='return confirmCenterDelete()'>Delete</a></td>";
				print "</tr>";
			}
			print "</table>";
		}else {
			print "<p class='class-alert'><span></span>No Centers registered in the system.!</p>";
		}


	}
	
	function deleteCenter(){
		
		$id=getParam("id");
		$c=new Center();
		if($c->deleteCenter($id)){
			print "<p class='class-alert'><span></span>Center deleted successfully.!</p>";
		}else{
			print "<p class='class-error'><span></span>There was an error deleting center.Please try again.</p>";
		}
		
	}
	
	function editCenter(){
		$c=new Center();
		$id=getParam('id');
		$center=$c->getCenterById($id);
		$exc=new SupervisorPerson();
		$execs=$exc->getSupPersons();
		
		$area=new Area();
		$areas=$area->getAll();
		?>

<form action="?page=com_center" method="post"
	onsubmit="return validateCenterform()" id="form-center">
	<table border="1">
		<tr>
			<td>Center Id</td>
			<td><input type="text" id="id-center-id" name="name-center-id" disabled="	disabled" value="<?php print $center->getId()?>"></td>
		</tr>
		<tr>
			<td>Center Name</td>
			<td><input type="text" id="id-center-name" name="name-center-name" value="<?php print $center->getId()?>"></td>
		</tr>
		<tr>
			<td>Related Area</td>
			<td><select name="name-center-area" id="name-center-area">
					<option selected="selected" value="-1">Select an area</option>
					<?php
					foreach ($areas as $tem){
						if($tem->getId()==$center->getAreaId()){
							print "<option value='".$tem->getId()."' selected='selected'>";
							print $tem->getName();
							print "</option>";
						}else{
							print "<option value='".$tem->getId()."'>";
							print $tem->getName();
							print "</option>";
						}	
						
					}
					?>

			</select>
			</td>
		</tr>
		<tr>
			<td>Center Supervisor</td>
			<td><select name="name-center-exec" id="name-center-exec">
					<option selected="selected" value="-1">Select a executive</option>
					<?php
					foreach ($execs as $temp){
						if($temp->getSupId()==$center->getSupervisor()){
							print "<option value='".$temp->getSupId()."' selected='selected'>";
							print $temp->getName();
							print "</option>";
						}else {
							print "<option value='".$temp->getSupId()."'>";
							print $temp->getName();
							print "</option>";
						}	
						
					}
					?>

			</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="submit" value="Save Center">
			<input type="reset" value="Reset"> 
			<input type="hidden" name="update-center-form"	value="<?php print $center->getId()?>">
			<input type="hidden" name="postAction"	value="update">
			</td>
		</tr>
	</table>
</form>

					<?php
		
	}
	

}




?>