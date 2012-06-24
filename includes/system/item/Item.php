<?php

class Item{
	
	private $itemCode;
	private $itemName;
	private $costPrice;
	private $sellingPrice;
	private $unit;
	private $remarks;
	private $db;
	
	public function Item(){
		$this->db=new HDatabase();
		$this->db->connect();
	}
	/*
	 * Get all items 
	 * 
	 */
	public function getAll(){
		
		$this->db->resetResult();
		$this->db->select("fm_item","*");
		$res=$this->db->getResult();
		$items=array();
		if($res){
			foreach ($res as $temp){
				$item=new Item();
				$item->setItemCode($temp['itemCode']);
				$item->setItemName($temp['itemName']);
				$item->setCostPrice($temp['costPrice']);
				$item->setSellingPrice($temp['sellingPrice']);
				$item->setUnit($temp['unit']);
				$item->setRemarks($temp['remarks']);
				array_push($items, $item);
				unset($item);
			}
			return $items;
		}else return false;
		
	}
	/*
	 * getting the item by code
	 */
	public function  getItemByCode($code){
		
		$this->db->resetResult();
		$this->db->select("fm_item","*","itemCode='$code'");
		$res=$this->db->getResult();
		$items=array();
		if($res){
			
				$item=new Item();
				$item->setItemCode($res[0]['itemCode']);
				$item->setItemName($res[0]['itemName']);
				$item->setCostPrice($res[0]['costPrice']);
				$item->setSellingPrice($res[0]['sellingPrice']);
				$item->setUnit($res[0]['unit']);
				$item->setRemarks($res[0]['remarks']);
				return $item;
			}
			
		
	}
	/*
	 * saving item
	 */
	
	public function saveItem(Item $item){
		$this->db->resetResult();
		$rows="itemCode,itemName,costPrice,sellingPrice,unit,remarks";
		$values=array($item->getItemCode(),
						$item->getItemName(),
						$item->getCostPrice(),
						$item->getSellingPrice(),
						$item->getUnit(),
						$item->getRemarks()					
				);
		
		if($this->db->insert("fm_item", $values,$rows)){
			return true;
		}else return false;
		
	}
	/*
	 * Deleting the item
	 */
	
	/*
	 * getting all items code wise for ajax call
	 * 
	 */
	public function j_getAllItems(){
		
		$items=$this->getAll();
		$j_items=array();
		if($items){
			$i=0;
			foreach ($items as $item){
				$j_items[$i]['label']=$item->getItemCode();
				$j_items[$i]['value']=$item->getSellingPrice();
				$i++;
			}
			return $j_items;
			
		}else{
			return false;
		}
		
	}
	
	public function deleteItem($code){
		
		if($this->db->delete("fm_item","itemCode='$code'")){
			return true;
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

	public function getItemName()
	{
	    return $this->itemName;
	}

	public function setItemName($itemName)
	{
	    $this->itemName = $itemName;
	}

	public function getCostPrice()
	{
	    return $this->costPrice;
	}

	public function setCostPrice($costPrice)
	{
	    $this->costPrice = $costPrice;
	}

	public function getSellingPrice()
	{
	    return $this->sellingPrice;
	}

	public function setSellingPrice($sellingPrice)
	{
	    $this->sellingPrice = $sellingPrice;
	}

	public function getUnit()
	{
	    return $this->unit;
	}

	public function setUnit($unit)
	{
	    $this->unit = $unit;
	}

	public function getRemarks()
	{
	    return $this->remarks;
	}

	public function setRemarks($remarks)
	{
	    $this->remarks = $remarks;
	}
}


?>