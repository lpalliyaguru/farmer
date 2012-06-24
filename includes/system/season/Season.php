<?php

class Season{
	private $name;
	private $id;
	private $description;
	private $db;
	
	public function Season(){
		$this->db=new HDatabase();
		$this->db->connect();
		
	}

	public function getAll(){
		
		$this->db->resetResult();
		$this->db->select("fm_season","*");
		$res=$this->db->getResult();
		
		$seasons=array();
		
		if($res){
			foreach ($res as $temp){
				$s=new Season();
				$s->setId($temp['id']);
				$s->setName($temp['name']);
				$s->setDescription($temp['description']);
				array_push($seasons,$s);
				unset($s);
			}
			
			return $seasons;
		}else return false;
	}
	public function getSeasonById($id){
		
		$this->db->resetResult();
		$this->db->select("fm_season","*","id='$id'");
		$res=$this->db->getResult();
		if($res){
			$s=new Season();
			$s->setId($id);
			$s->setName($res[0]['name']);
			$s->setDescription($res[0]['description']);
			return $s;
		}
	}
	public function saveSeason(Season $s){
		$this->db->resetResult();
		if($this->db->insert("fm_season", array($s->getId(),$s->getName(),$s->getDescription()))){
			
			return true;
		}else return false;
		
	}
	public function deleteSeason($id){
		$this->db->resetResult();
		if($this->db->delete("fm_season", "id='$id'")){
			
			return true;
		}else return false;
		
	}

	public function getSeasons(){
		$this->db->resetResult();
		$this->db->select('fm_season','*'); 
		$seasons = $this->db->getResult();
		
		if($seasons){
			return $seasons;			
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

	public function getDescription()
	{
	    return $this->description;
	}

	public function setDescription($description)
	{
	    $this->description = $description;
	}
}



?>