<?php
class HTML_renderer{


	function addArea(){

		$exc=new ExcecutivePerson();
		$execs=$exc->getExecPersons();

		?>

<form action="?page=com_area" method="post"
	onsubmit="return validateAreaform()" id="form-area">
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
			<td colspan="2"><input type="submit" value="Save Area"> <input
				type="reset" value="Reset"> <input type="hidden" name="postAction"
				value="save">
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
	<table border="1">
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
			<td colspan="2"><input type="submit" value="Save Area"> <input
				type="reset" value="Reset"> <input type="hidden"
				name="update-area-id" value="<?php print $area->getId()?>"> <input
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
			print "<h3>Areas registered in the system </h3>";
			print "<table border='1'>";
			print "<tr><th>Area Id</th><th>Area Name</th><th>Executive</th><th clospan='3'></th></tr>";
			foreach ($areas as $temp){
				print "<tr>";
				print "<td>".$temp->getId()."</td>";
				print "<td>".$temp->getName()."</td>";
				$ex=$e->getExecPersonById($temp->getExecutive());
				print "<td>".$ex->getName()."</td>";
				print "<td><a href='index.php?page=com_area&getAction=edit&id=".$temp->getId()."' >Edit</a></td>";
				print "<td><a href='index.php?page=com_area&getAction=del&id=".$temp->getId()."' onclick='return confirmAreaDelete()'>Delete</a></td>";
				print "</tr>";
			}
			print "</table>";
		}else{
			
			print "<p class='class-alert'><span></span>No areas registered in the system.!</p>";
		}
		
		
	}

}



?>