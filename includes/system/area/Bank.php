<?php
class Bank{
	private $code;
	private $name;
	private $db;
	public function Bank(){
		$this->db=new HDatabase();
		$this->db->connect();
	}
	
	public function getBankByCode($c){
		$this->db->resetResult();
		$this->db->select("fm_bank","*","bankCode='$c'");
		$res=$this->db->getResult();
		if($res){
			$b=new Bank();
			$b->setCode($c);
			$b->setName($res[0]['bankName']);
			return $b;
		}return false;
	}
	 public function saveBank(Bank $b){
	 	$this->db->resetResult();
	 	if($this->db->insert("fm_bank", array($b->getCode(),$b->getName()),"bankCode,bankName")){
	 		return true;
	 	}else return false;
	 	
	 }
	public function deleteBank($code){
	 	$this->db->resetResult();
	 	if($this->db->delete("fm_bank","bankCode='$code'" )){
	 		return true;
	 	}else return false;
	 	
	 }
	 
	 public function getBanks(){
	 	$this->db->resetResult();
	 	$this->db->select("fm_bank","bankCode,bankName");
	 	$res = $this->db->getResult();
	 	if($res){
	 		return  $res;
	 		
	 	}else{
	 		
	 		return "";
	 		
	 	}
	 	
	 	
	 }
	 

	public function getCode()
	{
	    return $this->code;
	}

	public function setCode($code)
	{
	    $this->code = $code;
	}

	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}
}




?>