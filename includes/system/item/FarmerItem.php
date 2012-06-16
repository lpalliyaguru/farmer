<?php
class FarmerItem{
	
	private $itemCode;
	private $farmerBelId;
	private $quantity;
	private $date;
	private $amount;
	private $db;
	
	public function FarmerItem(){
		$this->db=new HDatabase();
		$this->db->connect();
		
	}
	public function getAll(){
		
		$this->db->resetResult();
		$this->db->select("fm_farmerItem","*");
		$res=$this->db->getResult();
		$fitems=array();
		if($res){
			foreach ($res as $temp){
				$item=new FarmerItem();
				$item->setItemCode($temp['itemCode']);
				$item->setFarmerBelId($temp['farmerBelongId']);
				$item->setQuantity($temp['quantity']);
				$item->setDate($temp['date']);
				$item->setAmount($temp['amount']);
				array_push($fitems, $item);
				unset($item);
			}
			return $fitems;
		}else return false;
		 	
		
		
	}
	function getFarmerItemById($itemcode,$fbId){
		
		$this->db->resetResult();
		$this->db->select("fm_farmerItem","*","itemCode='$itemcode' AND farmerBelongId='$fbId'");
		$res=$this->db->getResult();
		if($res){
			
				$item=new FarmerItem();
				$item->setItemCode($res[0]['itemCode']);
				$item->setFarmerBelId($res[0]['farmerBelongId']);
				$item->setQuantity($res[0]['quantity']);
				$item->setDate($res[0]['date']);
				$item->setAmount($res[0]['date']);
				return $item;
			
		}else return false;
		
		
	}
	

	public function getItemCode()
	{
	    return $this->itemCode;
	}

	public function setItemCode($itemCode)
	{
	    $this->itemCode = $itemCode;
	}

	public function getFarmerBelId()
	{
	    return $this->farmerBelId;
	}

	public function setFarmerBelId($farmerBelId)
	{
	    $this->farmerBelId = $farmerBelId;
	}

	public function getQuantity()
	{
	    return $this->quantity;
	}

	public function setQuantity($quantity)
	{
	    $this->quantity = $quantity;
	}

	public function getDate()
	{
	    return $this->date;
	}

	public function setDate($date)
	{
	    $this->date = $date;
	}

	public function getAmount()
	{
	    return $this->amount;
	}

	public function setAmount($amount)
	{
	    $this->amount = $amount;
	}
}



?>