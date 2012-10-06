<?php
class HTML_renderer{


	function addArea(){

		$exc=new ExcecutivePerson();
		$execs=$exc->getExecPersons();

		?>
<h3 class='well'>Register an area :</h3>
<form action="?page=com_area" method="post"
	onsubmit="return validateAreaform()" id="form-area">
	<table class='table'>
		<tr>
			<td>Area Id</td>
			<td><input type="text" id="id-area-id" name="name-area-id"></td>
		</tr>
		<tr>
			<td>Area Name</td>
			<td><input type="text" id="id-area-name" name="name-area-name"></td>
		</tr>
		<tr>
			<td>Area Executive</td>
			<td><select name="name-area-exec" id="name-area-exec">
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
			<input class='button primary'type="submit" value="Save Area">
			<input class='button' type="reset" value="Reset">
			<input type="hidden" name="postAction" value="save">
			</td>
		</tr>
	</table>
</form>

					<?php
	}

	function editArea(){
		$id=getParam('id');
		$a=new Area();

		$exc=new ExcecutivePerson();
		$execs=$exc->getExecPersons();

		$area=$a->getAreaById($id);

		?>

<form action="?page=com_area" method="post"
	onsubmit="return validateAreaform()" id="form-area">
	<table class='table'>
		<tr>
			<td>Area Id</td>
			<td><input type="text" id="id-area-id" disabled="disabled"
				name="name-area-id" value="<?php print $area->getId()?>"></td>
		</tr>
		<tr>
			<td>Area Name</td>
			<td><input type="text" id="id-area-name" name="name-area-name"
				value="<?php print $area->getName()?>"></td>
		</tr>
		<tr>
			<td>Area Executive</td>
			<td><select name="name-area-exec" id="name-area-exec">
					<option value="-1">Select a executive</option>
					<?php
					foreach ($execs as $temp){
						if($temp->getExecId()==$area->getExecutive()){
							print "<option  selected='selected' value='".$temp->getExecId()."'>";
							print $temp->getName();
							print "</option>";
						}else{
							print "<option value='".$temp->getExecId()."'>";
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
			<input class='button primary' type="submit" value="Save Area"> 
			<input class='button ' type="reset" value="Reset">
			<input type="hidden" name="update-area-id" value="<?php print $area->getId()?>"> <input
				type="hidden" name="postAction" value="update">
			</td>
		</tr>
	</table>
</form>

					<?php

	}


	function viewAreas(){
		$a=new Area();
		$areas=$a->getAll();
		if($areas){
			$e=new ExcecutivePerson();
			print "<h3 class='well'>Areas registered in the system </h3>";
			print "<table  class='table '>";
			print "<tr><th>Id</th><th>Area Id</th><th>Area Name</th><th>Executive</th><th>Actions</th><th clospan='2'></th></tr>";
			$i=1;
			foreach ($areas as $temp){
				print "<tr>";
				print "<td>".$i."</td>";
				print "<td>".$temp->getId()."</td>";
				print "<td>".$temp->getName()."</td>";
				$ex=$e->getExecPersonById($temp->getExecutive());
				print "<td>".$ex->getName()."</td>";
				print "<td><a class ='button primary' href='index.php?page=com_area&getAction=edit&id=".$temp->getId()."' ><i class='icon-pencil'></i>Edit</a></td>";
				print "<td><a class ='button' href='index.php?page=com_area&getAction=del&id=".$temp->getId()."' onclick='return confirmAreaDelete()'><i class='icon-trash'></i>Delete</a></td>";
				print "</tr>";
				$i++;
			}
			print "</table>";
		}else{
				
			print "<p class='class-alert'><span></span>No areas registered in the system.!</p>";
		}


	}

}



?>