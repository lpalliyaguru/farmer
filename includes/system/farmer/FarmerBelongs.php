<?php
hImport("system.farmer.Farmer");
class FarmerBelongs{
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
				$fb->setFarmer($f->getFarmerByNIC($nic));
				$fb->setSeason($season);
				$fb->setCenter($center);
				$fb->setNic($nic);
				return $fb;
			}else return false;
			
		}else return false;
		
	
		
	}
	public function saveFarmerToSeason($nic,$season,$center){
		$f=new Farmer();
		/*
		 * checking farmer is existing 
		 */
		if($f->isFarmer($nic)){
			
				$this->db->resetResult();
				if($this->db->insert("fm_farmerBelongs", array($nic,$season,$center),"nic,seasonId,centerId")){
					return true;
					
				}else return false;
			
			
		}else return false;
	}
	
	public function deleteFarmerBelong($nic,$season,$center){
		$this->db->resetResult();
		$this->db->delete("fm_farmerBelongs","nic='$nic' AND seasonId='$season' AND centerId='$center'");
		
		
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
}




?>