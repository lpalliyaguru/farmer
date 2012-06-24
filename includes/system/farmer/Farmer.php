<?php
hImport('core.db.HDatabase');
hImport('core.Object');

class Farmer {
	private $entityId;
	private $nic;
	private $name;
	//private $seasonId;
	private $surname;
	private $gender;
	private $nationality;
	private $address;
	private $tp;
	private $areaId;
	//private $center;
	private $acherage;
	private $category;
	private $bankCode;
	private $accountNo;
	private $acctHolder;
	private $addedBy;
	private $db;
	
	public function Farmer(){
		$this->db=new HDatabase();
		$this->db->connect();

	}
	
	public function getAll(){
		$this->db->resetResult();
		$this->db->select("fm_farmer","*");
		$res=$this->db->getResult();
		$farmers=array();
			if($res){
				foreach ($res as $temp){
					$farmer=new Farmer();
					$farmer->setEntityId($temp['farmerId']);	
					$farmer->setNic($temp['nic']);
					$farmer->setName($temp['name']);
					$farmer->setSurname($temp['surName']);
					$farmer->setGender($temp['gender']);
					$farmer->setNationality($temp['nationality']);
					$farmer->setAddress($temp['address']);
					$farmer->setTp($temp['tpNo']);
					$farmer->setAreaId($temp['areaId']);
					$farmer->setAcherage($temp['acherage']);
					$farmer->setCategory($temp['prodCategory']);
					$farmer->setBankCode($temp['bankcode']);
					$farmer->setAccountNo($temp['acctNo']);
					$farmer->setAcctHolder($temp['acctHolderName']);	
					$farmer->setAddedBy($temp['addedBy']);
				
					array_push($farmers, $farmer);
				}
				return $farmers;
		}else return false;
		
	}
	
	public function getFarmerByNIC($nic){
		
		$this->db->resetResult();
		$this->db->select("fm_farmer","*","nic='$nic'");
		$res=$this->db->getResult();
		
		if($res){
			$farmer=new Farmer();
			$farmer->setEntityId($res[0]['farmerId']);	
			$farmer->setNic($res[0]['nic']);
			$farmer->setName($res[0]['name']);
			$farmer->setSurname($res[0]['surName']);
			$farmer->setGender($res[0]['gender']);
			//$farmer->setSeasonId($re0s[0]['seasonId']);
			$farmer->setNationality($res[0]['nationality']);
			$farmer->setAddress($res[0]['address']);
			$farmer->setTp($res[0]['tpNo']);
			//$farmer->setAreaId($res[0]['areaId']);
			//$farmer->setCenter($res[0]['centerId']);
			$farmer->setAcherage($res[0]['acherage']);
			$farmer->setCategory($res[0]['prodCategory']);
			$farmer->setBankCode($res[0]['bankcode']);
			$farmer->setAccountNo($res[0]['acctNo']);
			$farmer->setAcctHolder($res[0]['acctHolderName']);	
			$farmer->setAddedBy($res[0]['addedBy']);
			
			return $farmer;
		}else return false;
		
		
	}
	
	public function   getFarmer($nic,$season,$center){
		
		$this->db->resetResult();
		$this->db->select("fm_farmer","*","nic='$nic' AND seasonId='$season' AND centerId='$center'");
		$res=$this->db->getResult();
		
		if($res){
			$farmer=new Farmer();
			$farmer->setEntityId($res[0]['farmerId']);	
			$farmer->setNic($res[0]['nic']);
			$farmer->setName($res[0]['name']);
			$farmer->setSurname($res[0]['surName']);
			$farmer->setGender($res[0]['name']);
			$farmer->setSeasonId($res[0]['seasonId']);
			$farmer->setNationality($res[0]['nationality']);
			$farmer->setAddress($res[0]['address']);
			$farmer->setTp($res[0]['tpNo']);
			$farmer->setAreaId($res[0]['areaId']);
			$farmer->setCenter($res[0]['centerId']);
			$farmer->setAcherage($res[0]['acherage']);
			$farmer->setCategory($res[0]['prodCategory']);
			$farmer->setBankCode($res[0]['bankcode']);
			$farmer->setAccountNo($res[0]['acctNo']);
			$farmer->setAcctHolder($res[0]['acctHolderName']);	
			$farmer->setAddedBy($res[0]['addedBy']);
				
			return $farmer;
		}else return false;
		
		
	}
	public function saveFarmer(Farmer $farmer){
		
		$this->db->resetResult();
		$insert=array($farmer->getEntityId(),$farmer->getName(),$farmer->getSurname(),//$farmer->getSeasonId(),
					$farmer->getGender(),$farmer->getNic(),$farmer->getNationality(),$farmer->getAddress(),
					$farmer->getTp(),//$farmer->getAreaId(),//$farmer->getCenter(),
					$farmer->getAcherage(),$farmer->getCategory(),
					$farmer->getBankCode(),$farmer->getAccountNo(),$farmer->getAcctHolder(),$farmer->getAddedBy()
					
					);
		$rows="farmerId,name,surName,gender,nic,nationality,address,tpNo,acherage,prodCategory,bankCode,acctNo,acctHolderName,addedBy";
		if($this->db->insert("fm_farmer", $insert,$rows)){
			return true;
			
		}else{
			return false;
		}
		
		
	}
	/*
	 * deprecated
	public function deleteFarmer($nic,$season,$center){
		
		$this->db->resetResult();
		if($this->db->delete("fm_farmer","nic='$nic' AND seasonId='$season' AND centerId='$center'")){
			return true;
		}else {
			return false;
		}
		
		
		
	}
	*/
	public function deleteFarmer($nic){
		
		$this->db->resetResult();
		if($this->db->delete("fm_farmer","nic='$nic'")){
			return true;
		}else {
			return false;
		}
		
		
		
	}
	public function isFarmer($nic){
		
		$this->db->resetResult();
		$this->db->select("fm_farmer","*","nic='$nic'");
		$res=$this->db->getResult();
		
		if($res){
			return true;
			
		}else return false;
	}
	/*
	 * deprecated
	public function isFarmerOfSeason($nic,$season,$center){
		
		$this->db->resetResult();
		$this->db->select("fm_farmer","*","nic='$nic' AND seasonId='$season' AND centerId='$center'");
		$res=$this->db->getResult();
		
		if($res){
			return true;
			
		}else return false;
	}
	*/
	
	public function updateFarmer(Farmer $farmer){
		
		if($this->deleteFarmer($farmer->getNic())){
			
			if($this->saveFarmer($farmer)){
				return true;
			}else {
				return false;
			}
			
		}else{
			return false;
		}
		
		
	}
	
	public function j_getFarmers(){
		$this->db->resetResult();
		$this->db->select("fm_farmer","*");
		$res = $this->db->getResult();
		
		$array = array();
		
		if($res){
			$i = 0;
			foreach ($res as $r) {
				$array[$i]['farmerId'] = $r['farmerId'];
				$array[$i]['name'] = $r['name'];
				$array[$i]['surname'] = $r['surName'];
				$array[$i]['nic'] = $r['nic'];
				$i++;
			}
			
			return $array;
		}return false;
		
	}
	
	
	/*
	 * setting getters and setters  of Farmer class 
	 * 
	 */
	public function getEntityId()
	{
	    return $this->entityId;
	}

	public function setEntityId($eid)
	{
	    $this->entityId = $eid;
	}
	public function getNic()
	{
	    return $this->nic;
	}

	public function setNic($nic)
	{
	    $this->nic = $nic;
	}
	public function getFullName()
	{
	    return $this->name." ".$this->surname;
	}
	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

	public function getSurname()
	{
	    return $this->surname;
	}

	public function setSurname($surname)
	{
	    $this->surname = $surname;
	}

	public function getGender()
	{
	    return $this->gender;
	}

	public function setGender($gender)
	{
	    $this->gender = $gender;
	}

	public function getNationality()
	{
	    return $this->nationality;
	}	

	public function setNationality($nationality)
	{
	    $this->nationality = $nationality;
	}

	public function getAddress()
	{
	    return $this->address;
	}

	public function setAddress($address)
	{
	    $this->address = $address;
	}

	public function getTp()
	{
	    return $this->tp;
	}

	public function setTp($tp)
	{
	    $this->tp = $tp;
	}

	public function getAreaId()
	{
	    return $this->areaId;
	}

	public function setAreaId($areaId)
	{
	    $this->areaId = $areaId;
	}

	public function getCenter()
	{
	    return $this->center;
	}

	public function setCenter($center)
	{
	    $this->center = $center;
	}

	public function getAcherage()
	{
	    return $this->acherage;
	}

	public function setAcherage($acherage)
	{
	    $this->acherage = $acherage;
	}

	public function getCategory()
	{
	    return $this->category;
	}

	public function setCategory($category)
	{
	    $this->category = $category;
	}

	public function getBankCode()
	{
	    return $this->bankCode;
	}

	public function setBankCode($bankCode)
	{
	    $this->bankCode = $bankCode;
	}

	public function getAccountNo()
	{
	    return $this->accountNo;
	}

	public function setAccountNo($accountNo)
	{
	    $this->accountNo = $accountNo;
	}

	public function getAcctHolder()
	{
	    return $this->acctHolder;
	}

	public function setAcctHolder($acctHolder)
	{
	    $this->acctHolder = $acctHolder;
	}

	public function getAddedBy()
	{
	    return $this->addedBy;
	}

	public function setAddedBy($addedBy)
	{
	    $this->addedBy = $addedBy;
	}

	public function getSeasonId()
	{
	    return $this->seasonId;
	}

	public function setSeasonId($seasonId)
	{
	    $this->seasonId = $seasonId;
	}
	

}



?>