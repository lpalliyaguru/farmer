<?php
class Employee{
	protected $empId;
	protected $name;
	protected $address;
	protected $db;
	public function Employee(){
		$this->db=new HDatabase();
		$this->db->connect();
	
	} 
	public function getEmployeeById($id){
		$this->db->resetResult();
		$this->db->select("fm_employee","*","empId='$id'");
		$res=$this->db->getResult();
		if($res){
			$e=new Employee();
			$e->setEmpId($res[0]["empId"]);
			$e->setName($res[0]["name"]);
			$e->setAddress($res[0]["address"]);
			return $e;
		}else return false;


	}
	
	public function saveEmployee($emp){
	}
	
	public function getEmpId()
	{
	    return $this->empId;
	}

	public function setEmpId($empId)
	{
	    $this->empId = $empId;
	}

	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

	public function getAddress()
	{
	    return $this->address;
	}

	public function setAddress($address)
	{
	    $this->address = $address;
	}
}

class ExcecutivePerson extends Employee{
	
	protected  $execId;
	public function ExcecutivePerson(){
		parent::Employee();
	}
	
	public function getExecPersonById($id){
		
		
		$this->db->resetResult();
		$this->db->select("fm_execPerson","*","execId='$id'");
		$res=$this->db->getResult();
		if($res){
			$person=new ExcecutivePerson();
			$person->setEmpId($res[0]["empId"]);
			$e=$this->getEmployeeById($res[0]["empId"]);
			$person->setExecId($id);
			$person->setAddress($e->getAddress());
			$person->setName($e->getName());
			return $person;
			
		}else return false;
	}
	
	public function saveEmployee(ExcecutivePerson $emp){
		$this->db->resetResult();
		if($this->db->insert("fm_employee", array($emp->getEmpId(),$emp->getName(),$emp->getAddress()),
							"empId,name,address") && $this->db->insert("fm_execPerson", array($emp->getEmpId(),$emp->getExecId()))){
			
			return true;
		}else return false;
	}
	
	public function deleteEmployee($id){
		$this->db->resetResult();
		if($this->db->delete("fm_employee","empId='$id'") && $this->db->delete("fm_execPerson", "empId='$id'")){
			
			return true;
		}else return false;
	}
	
	public function getExecId(){
		return $this->execId;
	}
	public function setExecId($id){
		$this->execId=$id;
	}
	
	
}

class SupervisorPerson extends Employee{

	protected  $supId;
	public function SupervisorPerson(){
		parent::Employee();
	}
	public function getSupPersonById($id){
		
		
		$this->db->resetResult();
		$this->db->select("fm_supPerson","*","supId='$id'");
		$res=$this->db->getResult();
		if($res){
			$person=new SupervisorPerson();
			$person->setEmpId($res[0]["empId"]);
			$e=$this->getEmployeeById($res[0]["empId"]);
			$person->setSupId($id);
			$person->setAddress($e->getAddress());
			$person->setName($e->getName());
			return $person;
			
		}else return false;
	}
	
	public function saveEmployee(SupervisorPerson $emp){
		$this->db->resetResult();
		if($this->db->insert("fm_employee", array($emp->getEmpId(),$emp->getName(),$emp->getAddress()),
							"empId,name,address") && $this->db->insert("fm_supPerson", array($emp->getEmpId(),$emp->getSupId()))){
			
			return true;
		}else return false;
	}
	public function deleteEmployee($id){
		$this->db->resetResult();
		if($this->db->delete("fm_employee","empId='$id'") && $this->db->delete("fm_supPerson", "empId='$id'")){
			
			return true;
		}else return false;
	}
	public function getSupId(){
		return $this->supId;
	}
	public function setSupId($id){
		$this->supId=$id;
	}
	

}
