<?php
hImport("system.farmer.Farmer");
class FarmerBelongs{
	private $id;
	private $nic;
	private $season;
	private $center;
	private $db;
	private $farmer;
	public function FarmerBelongs(){
		$this->db=new HDatabase();
		$this->db->connect();
		
	}
	
	public function getFarmerBelong($nic,$season,$center){
		$f=new Farmer();
		
		$this->db->resetResult();
		$this->db->select("fm_farmerBelongs","*","nic='$nic' AND seasonId='$season' AND centerId='$center'");
		$res=$this->db->getResult();
		
		if($res){
			$fb=new FarmerBelongs();
			if($f->getFarmerByNIC($nic)){
				$fb->setId($res[0]['id']);
				$fb->setFarmer($f->getFarmerByNIC($nic));
				$fb->setSeason($season);
				$fb->setCenter($center);
				$fb->setNic($nic);
				return $fb;
			}else return false;
			
		}else return false;	
		
	}
	
	public function getFarmerBelongById($id){
		$this->db->resetResult();
		$this->db->select("fm_farmerBelongs","*","id='$id'");
		if($res=$this->db->getResult()){
			$fb=new FarmerBelongs();
			$fb->setId($id);
			$fb->setNic($res[0]['nic']);
			$fb->setCenter($res[0]['centerId']);
			$fb->setSeason($res[0]['seasonId']);
			return $fb;
		}else return false;
		
	}
	public function saveFarmerToSeason($nic,$season,$center,$id=""){
		$f=new Farmer();
		/*
		 * checking farmer is existing 
		 */
		if($f->isFarmer($nic)){
			
				$this->db->resetResult();
				if($this->db->insert("fm_farmerBelongs", array($id,$nic,$season,$center),"id,nic,seasonId,centerId")){
					return true;
					
				}else return false;
			
			
		}else return false;
	}
	
	public function deleteFarmerBelong($nic,$season,$center){
		$this->db->resetResult();
		if($this->db->delete("fm_farmerBelongs","nic='$nic' AND seasonId='$season' AND centerId='$center'")){
			return true;
		}else return false;
				
	}
	
	public function deleteFarmerBelongById($id){
		$this->db->resetResult();
		if($this->db->delete("fm_farmerBelongs","id='$id'")){
			return true;
		}else return false;		
	}
	
	public function getAll(){
		
		$this->db->resetResult();
		$this->db->select("fm_farmerBelongs","*");
		$res = $this->db->getResult();
		
		$array = array();
				
		if($res){
			$i = 0;
			foreach ($res as $r){
				$farmerbl = new FarmerBelongs();
				$farmerbl->setId($r['id']);
				$farmerbl->setNic($r['nic']);
				$farmerbl->setSeason($r['seasonId']);  
				$farmerbl->setCenter($r['centerId']);
				
				array_push($array, $farmerbl);				
			}			
			return $array;
		}else return false;  
		
		
	}
	
	public function updateFarmerBelong(FarmerBelongs $f) {
		/*
		 * this function may not be needed
		 */
		
	}
	public function farmerBelongExist(FarmerBelongs $f){
		
		$this->db->resetResult();
		$this->db->select("fm_farmerBelongs","*","nic='".$f->getNic()."' AND seasonId='".$f->getSeason()."' AND centerId='".$f->getCenter()."'");
		$res=$this->db->getResult();
		if($res){
			return true;
			
		}else{
			return false;
		}
	}

	public function getNic()
	{
	    return $this->nic;
	}

	public function setNic($nic)
	{
	    $this->nic = $nic;
	}

	public function getSeason()
	{
	    return $this->season;
	}

	public function setSeason($season)
	{
	    $this->season = $season;
	}

	public function getCenter()
	{
	    return $this->center;
	}

	public function setCenter($center)
	{
	    $this->center = $center;
	}

	public function setFarmer($farmer)
	{
	    $this->farmer = $farmer;
	}
	public function getFarmer()
	{
	    return $this->farmer ;
	}

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}
}




?>