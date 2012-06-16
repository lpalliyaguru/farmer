<?php
class GetFarmer{

	public function getFarmers(){
		
		$farmer = new Farmer();
		if($farmerNames = $farmer->getAll()){
					
		echo "<center><h1>Registered Farmers</h1></center><br/><br/>";
		echo "<table id='farmer_names' cellpadding='1' cellspacing='1' border='1' >";
		echo "<tr><th>Farmer Id</th><th>Name</th><th></th><th></th></tr>";
		
		$i = 1;
		foreach ($farmerNames as $f){
			print "<tr>";
			print "<td class='class-farmer_names-nameRow'>".$f->getEntityId()."</td>";
			print "<td>".$f->getSurname()."</td>";
			print "<td><center><a href='index.php?page=com_farmer&getAction=editForm&nic=".$f->getNic()."' id='id-farmer_names-editBut".$i."'  ><div class='class-farmer_names-editBut'>Edit</div></a></center></td>";
			print "<td><center><a href='index.php?page=com_farmer&getAction=deleteForm&nic=".$f->getNic()."' onclick='return confirm(\"Are you sure ?\")' id='id-farmer_names-delBut".$i."'  ><div class='class-farmer_names-delBut'>Delete</div></a></center></td>";
			print "</tr>";
			$i++;
		}
		
		echo "</table>";	
		}else{
			print "<p class='class-error'><span></span>No farmers founded.Please try again.</p>";
		}
		
	}
	
	public function getFarmersforSeason(){
		
		$farmerBelongs = new FarmerBelongs();
		
		if($farmerBlArr = $farmerBelongs -> getAll()){ 
		$farmer = new Farmer();
		$season = new Season();
		$center = new Center();		
		
		echo "<center><h1>Registered Farmers for Seasons</h1></center><br/><br/>";
		echo "<table id='farmer_names-seasons' cellpadding='1' cellspacing='1' border='1' >";
		echo "<tr><th>Farmer NIC</th>";
		echo "<th>Farmer Name</th>";
		echo "<th>Season</th>";
		echo "<th>Center</th><th></th><th></th></tr>";
				
		foreach ($farmerBlArr as $bl){
			$farmerNic = $bl->getNic();
			$farmerName = $farmer->getFarmerByNIC($farmerNic)->getName();
			$seasonName = $season->getSeasonById($bl->getSeason())->getName();		
			$centerName = $center->getCenterById($bl->getCenter())->getName();
			
			print "<tr>";
			print "<td>".$farmerNic."</td>";
			print "<td>".$farmerName."</td>";
			print "<td>".$seasonName."</td>";
			print "<td>".$centerName."</td>";
			print "<td><center><a href='index.php?page=com_farmer&getAction=editFarmerforSeason&id=".$bl->getId()."' ><div class='class-farmer_names-editBut'>Edit</div></a></td>";
			print "<td><center><a href='index.php?page=com_farmer&getAction=deleteFarmerforSeason&id=".$bl->getId()."' onclick='return confirm(\"Are you sure ?\")' ><div class='class-farmer_names-delBut' >Delete</div></a></center></td>";
		}
		
		}else{
			print "<p class='class-error'><span></span>No farmers founded.Please try again.</p>";
		}
	}
	
	
}



?>