<?php
class GetFarmer{

	public function getFarmers(){
		
		$farmer = new Farmer();
		$farmerNames = $farmer->getAll();
		
		echo "<center><h1>Registered Farmers</h1></center><br/><br/>";
		echo "<table id='farmer_names' cellpadding='0' cellspacing='0' >";
		
		$i = 1;
		foreach ($farmerNames as $f){
			print "<tr>";
			print "<td class='class-farmer_names-nameRow'>".$f['name']." ".$f['surName']."</td>";
			print "<td><input type='button' id='id-farmer_names-editBut".$i."' class='class-farmer_names-editBut' value='Edit' /></td>";
			print "<td><a href='localhost/farmer/index.php?page=com_farmer&getAction=editFarmer&' id='id-farmer_names-delBut".$i."' class='class-farmer_names-delBut' value='Delete' /></td>";
			print "</tr>";
			$i++;
		}
		
		echo "</table>";
		
		
		
	}
	
	
}



?>