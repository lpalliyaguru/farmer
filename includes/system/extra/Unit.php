<?php
class Unit{
	
	private $id;
	private $value;
	private $db;
	public function Unit(){
		
		$this->db=new HDatabase();
		$this->db->connect();
		
	}
		
	
	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getValue()
	{
	    return $this->value;
	}

	public function setValue($value)
	{
	    $this->value = $value;
	}
}



?>