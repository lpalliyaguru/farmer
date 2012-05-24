<?php

class AcccesType {
	private $id;
	private $type;
	private $db;
	public  function AcccesType(){
		$this->db=new HDatabase();
		$this->db->connect();
		
	}
	public function getAcccessTypeById($id){
	
		$this->db->resetResult();
		$this->db->select("fm_previledges","*","id='$id'");
		$res=$this->db->getResult();
		if($res){
			$at=new AcccesType();
			$at->setId($res[0]['id']);
			$at->setType($res[0]['name']);
			return $at;
		}else{
			return false;
		}
		
	}
	public function getAcccessTypeByName($name){
	
		$this->db->resetResult();
		$this->db->select("fm_previledges","*","name='$name'");
		$res=$this->db->getResult();
		if($res){
			$at=new AcccesType();
			$at->setId($res[0]['id']);
			$at->setType($res[0]['name']);
			return $at;
		}else{
			return false;
		}
		
	}
	
	

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getType()
	{
	    return $this->type;
	}

	public function setType($type)
	{
	    $this->type = $type;
	}

	public function getDb()
	{
	    return $this->db;
	}

	public function setDb($db)
	{
	    $this->db = $db;
	}
}


?>
