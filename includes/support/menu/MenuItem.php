<?php

class MenuItem{
	private $id;
	private $name;
	private $link;
	private $parent;
	private $accessType;
	private $db;
	
	
	public function MenuItem(){
		$this->db=new HDatabase();
		$this->db->connect();
		
	}
	
	public function getMenuItemById($id){
		
		$this->db->resetResult();
		$this->db->select("fm_menu","*","id='$id'");
		$res=$this->db->getResult();
		if($res){
			$menuItem=new MenuItem();
			$menuItem->setId($id);
			$menuItem->setName($res[0]['name']);
			$menuItem->setLink($res[0]['link']);
			$menuItem->setParent($res[0]['parent']);
			$menuItem->setAccessType($res[0]['accesstype']);
			return $menuItem;
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

	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

	public function getLink()
	{
	    return $this->link;
	}

	public function setLink($link)
	{
	    $this->link = $link;
	}

	public function getParent()
	{
	    return $this->parent;
	}

	public function setParent($parent)
	{
	    $this->parent = $parent;
	}

	public function getAccessType()
	{
	    return $this->accessType;
	}

	public function setAccessType($accessType)
	{
	    $this->accessType = $accessType;
	}
}


?>