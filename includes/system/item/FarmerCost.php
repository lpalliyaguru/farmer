<?php
class FarmerCost{
	
	private $id;
	private $farmerblid;
	private $itemCode;
	private $date;
	private $cost;
	private $db;
	public function FarmerCost(){
		$this->db=new HDatabase();
		$this->db->connect();
		
	}
	
	/*
	 * dummy should be implemented
	 */
	
	
	
	
	
	public function __destruct(){
		$this->db->disconnect();
		unset($this->db);
	}

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getFarmerblid()
	{
	    return $this->farmerblid;
	}

	public function setFarmerblid($farmerblid)
	{
	    $this->farmerblid = $farmerblid;
	}

	public function getItemCode()
	{
	    return $this->itemCode;
	}

	public function setItemCode($itemCode)
	{
	    $this->itemCode = $itemCode;
	}

	public function getDate()
	{
	    return $this->date;
	}

	public function setDate($date)
	{
	    $this->date = $date;
	}

	public function getCost()
	{
	    return $this->cost;
	}

	public function setCost($cost)
	{
	    $this->cost = $cost;
	}
}




?>