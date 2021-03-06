<?php
hImport("system.area.Center");
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
	
	public function j_getAll(){
		
		$areas=$this->getAll();
		$j_areas=array();
		if($areas){
			$i=0;
			foreach ($areas as $area){
				$j_areas[$i]['value']=$area->getId();
				$j_areas[$i]['label']=$area->getName();
				$i++;
			}
			return $j_areas;
			
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
		$c=new Center();
		$centers=$c->getCentersByArea($id);
		
		if($this->db->delete("fm_area","areaId='".$id."'")){
			foreach ($centers as $temp){
				$c->deleteCenter($temp->getId());
			}
			return true;
		}else return false;
		
		
	}
	
	public function getAreaNames(){
		$this->db->resetResult();
		$this->db->select("fm_area","areaId,areaName");
		$res = $this->db->getResult();
		if($res){
			return $res;
		}else{
			return false;
		}
		
		
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