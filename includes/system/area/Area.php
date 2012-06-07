<?php

class Area{
	private $name;
	private $id;
	private $executive;
	private $db;
	public function Area(){
		$this->db=new HDatabase();
		$this->db->connect();
	}
	
	public function getAll(){
		$this->db->resetResult();
		$this->db->select("fm_area","*");
		$res=$this->db->getResult();
		$areas=array();
		if($res){
			foreach ($res as $temp){
				$a=new Area();
				$a->setId($temp['areaId']);
				$a->setExecutive($temp['executiveId']);
				$a->setName($temp['areaName']);
				array_push($areas,$a);
			}
			
			return $areas;
		}else{
			return false;
		}
	}
	public function getAreaById($id){
		$this->db->resetResult();
		$this->db->select("fm_area","*","areaId='".$id."'");
		$res=$this->db->getResult();
		if($res){
			$a=new Area();
			$a->setId($id);
			$a->setExecutive($res[0]['executiveId']);
			$a->setName($res[0]['areaName']);
			return $a;
		}else{
			return false;
		}
		
	}
	
	public function isArea($id){
		$this->db->resetResult();
		$this->db->select("fm_area","*","areaId='".$id."'");
		$res=$this->db->getResult();
		if($res){
			return true;
		}else return false;
		
	}
	public function saveArea(Area $a){
		
		$this->db->resetResult();
		
			if($this->db->insert("fm_area", array($a->getId(),$a->getName(),$a->getExecutive()))){
				return true;
			}else {
				return false;
			}
		
	}
	public function deleteArea($id){
		
		$this->db->resetResult();
		if($this->db->delete("fm_area","areaId='".$id."'")){
			return true;
		}else return false;
		
		
	}
	
	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getExecutive()
	{
	    return $this->executive;
	}

	public function setExecutive($executive)
	{
	    $this->executive = $executive;
	}
}



?>