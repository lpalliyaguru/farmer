<?php
hImport("system.area.Area");
class Center{
	private $id;
	private $name;
	private $areaId;
	private $supervisor;
	private $db;
	public function Center(){
		$this->db=new HDatabase();
		$this->db->connect();
	
	}
	public function getCenterById($id){
	
		$this->db->resetResult();
		$this->db->select("fm_center","*","centerId='".$id."'");
		$res=$this->db->getResult();
		if($res){
			$c=new Center();
			$c->setId($res[0]['centerId']);
			$c->setAreaId($res[0]['areaId']);
			$c->setName($res[0]['centerName']);
			$c->setSupervisor($res[0]['supervisorId']);
			return $c;
		}else return false;
	
	}
	
	public function getCentersByArea($id){
		 $centers=array();
		$this->db->resetResult();
		$this->db->select("fm_center","*","areaId='".$id."'");
		$res=$this->db->getResult();
		if($res){
			foreach	 ($res as $temp){
				$c=new Center();
				$c->setId($temp['centerId']);
				$c->setAreaId($temp['areaId']);
				$c->setName($temp['centerName']);
				$c->setSupervisor($temp['supervisorId']);
				array_push($centers, $c);
			}
		return $centers;
		}else return false;
		
	}
	
	public function saveCenter(Center $c){
		$a=new Area();
		$this->db->resetResult();
		if($a->isArea($c->getAreaId())){
			if($this->db->insert("fm_center", array($c->getId(),$c->getAreaId(),$c->getName(),$c->getSupervisor()))){
				return true;
			}else {
				return false;
			}
		}return false;
		
		
	}
	
	public function deleteCenter($id){
		
		$this->db->resetResult();
		if($this->db->delete("fm_center","centerId='".$id."'")){
			return true;
		}else return false;
		
		
	}

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

	public function getAreaId()
	{
	    return $this->areaId;
	}

	public function setAreaId($areaId)
	{
	    $this->areaId = $areaId;
	}

	public function getSupervisor()
	{
	    return $this->supervisor;
	}

	public function setSupervisor($supervisor)
	{
	    $this->supervisor = $supervisor;
	}
}