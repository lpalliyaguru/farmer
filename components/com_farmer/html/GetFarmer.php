<?php
class GetFarmer{

	public function getFarmers(){
		
		$farmer = new Farmer();
		$farmerNames = $farmer->getAll();
		
		//print_r($farmerNames);
		
	
		echo "<center><h1>Registered Farmers</h1></center><br/><br/>";
		echo "<table id='farmer_names' cellpadding='0' cellspacing='0' >";
		
		$i = 1;
		foreach ($farmerNames as $f){
			print "<tr>";
			print "<td class='class-farmer_names-nameRow'>".$f->getEntityId()." ".$f->getSurname()."</td>";
			print "<td><a href='index.php?page=com_farmer&getAction=editForm&nic=".$f->getNic()."' id='id-farmer_names-editBut".$i."'  ><div class='class-farmer_names-editBut'>Edit</div></a></td>";
			print "<td><a href='index.php?page=com_farmer&getAction=deleteForm&nic=".$f->getNic()."' id='id-farmer_names-delBut".$i."'  ><div class='class-farmer_names-delBut'>Delete</div></a></td>";
			print "</tr>";
			$i++;
		}
		
		echo "</table>";	
		
	}
	
	public function getFarmersforSeason(){
		
		$farmerBelongs = new FarmerBelongs();
		
		
	}
	
	
}



?>