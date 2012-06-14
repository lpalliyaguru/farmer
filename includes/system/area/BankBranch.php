<?php

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