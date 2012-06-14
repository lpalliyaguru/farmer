<?php
class Bank{
	private $code;
	private $name;
	private $db;
	public function Bank(){
		$this->db=new HDatabase();
		$this->db->connect();
	}
	
	public function getAll(){
		
		$this->db->resetResult();
		$this->db->select("fm_bank","*");
		$res=$this->db->getResult();
		$banks=array();
		if($res){
			foreach ($res as $temp){
				$b=new Bank();
				$b->setCode($temp['bankCode']);
				$b->setName($temp['bankName']);
				
				
				array_push($banks,$b);
			}
			
			return $banks;
			
		}else{
			return false;
		}
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

class BankBranch{
	
	private $branchCode;
	private $branchName;
	private $bankCode;
	private $db;
	public function BankBranch(){
		$this->db=new HDatabase();
		$this->db->connect();
		
	}
	
	public function getAll(){
			$this->db->resetResult();
			$this->db->select("fm_bankBranch","*");
			$res=$this->db->getResult();
			$bankbranches=array();
			if($res){
				foreach ($res as $temp){
					$b=new BankBranch();
					$b->setBranchCode($temp['branchCode']);
					$b->setBranchName($temp['branchName']);
					$b->setBankCode($temp['bankCode']);
					
					array_push($bankbranches,$b);
				}
				
				return $bankbranches;
				
			}else{
				return false;
			}
			
	}
	public function getBrancehsByBank($id){
		
		$this->db->resetResult();
			$this->db->select("fm_bankBranch","*","bankCode='$id'");
			$res=$this->db->getResult();
			$bankbranches=array();
			if($res){
				foreach ($res as $temp){
					$b=new BankBranch();
					$b->setBranchCode($temp['branchCode']);
					$b->setBranchName($temp['branchName']);
					$b->setBankCode($temp['bankCode']);
					
					array_push($bankbranches,$b);
				}
				
				return $bankbranches;
				
			}else{
				return false;
			}
			
	}
	
	public function getBankBranchById($id){
	
		$this->db->resetResult();
		$this->db->select("fm_bankBranch","*","branchCode='".$id."'");
		$res=$this->db->getResult();
		if($res){
			$c=new BankBranch();
			$c->setBranchCode($res[0]['branchCode']);
			$c->setBranchName($res[0]['branchName']);
			$c->setBankCode($res[0]['bankCode']);
			return $c;
		}else return false;
	
	}
	
	public function saveBranch(BankBranch $b){
	
	 	$this->db->resetResult();
	 	if($this->db->insert("fm_bankBranch", array($b->getBranchCode(),$b->getBranchName(),$b->getBankCode()),"branchCode,branchName,bankCode")){
	 		return true;
	 	}else return false;
	 	
	 }

	public function deleteBranch($id){
	
	 	$this->db->resetResult();
	 	if($this->db->delete("fm_bankBranch", "branchCode='".$id."'")){
	 		return true;
	 	}else return false;
	 	
	 }

	public function getBranchCode()
	{
	    return $this->branchCode;
	}

	public function setBranchCode($branchCode)
	{
	    $this->branchCode = $branchCode;
	}

	public function getBranchName()
	{
	    return $this->branchName;
	}

	public function setBranchName($branchName)
	{
	    $this->branchName = $branchName;
	}

	public function getBankCode()
	{
	    return $this->bankCode;
	}

	public function setBankCode($bankCode)
	{
	    $this->bankCode = $bankCode;
	}
}


?>
