<?php
hImport("system.farmer.FarmerBelongs");
class FarmerItem{

	private $itemCode;
	private $farmerBelId;
	private $quantity;
	private $date;
	private $desc;
	private $amount;
	private $receipt;
	private $unit;
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
				$item->setDesc($temp['desc']);
				$item->setReceipt($temp['receipt']);

				array_push($fitems, $item);
				unset($item);
			}
			return $fitems;
		}else return false;



	}
	
	function getFarmerItem($belong,$date,$item,$receipt){
		
		
		$this->db->resetResult();
		$this->db->select("fm_farmerItem","*","itemCode='$item' AND farmerBelongId='$belong' AND date='$date' AND receipt='$receipt'");
		$res=$this->db->getResult();
		
		if($res){
			$f=new FarmerItem();
			$f->setFarmerBelId($belong);
			$f->setItemCode($item);
			$f->setReceipt($receipt);
			$f->setDate($date);
			$f->setAmount($res[0]['amount']);
			$f->setDesc($res[0]['description']);
			$f->setQuantity($res[0]['quantity']);
			//$f->setUnit($res[0]['unit']);
			
			
		}return false;
		
		
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
			$item->setAmount($res[0]['amount']);
			$item->setDesc($res[0]['desc']);
			$item->setReceipt($res[0]['receipt']);
			return $item;
				
		}else return false;


	}

	function getItemIssueByFamerDate($f,$d,$r=null){

		$this->db->resetResult();
		if($r!=null){
			$this->db->select("fm_farmerItem","*","farmerBelongId='$f' AND date='$d' AND receipt='$r'");
		}else{
			$this->db->select("fm_farmerItem","*","farmerBelongId='$f' AND date='$d'");
		}
		$res=$this->db->getResult();
		$issues=array();
		if($res){
				
			foreach ($res as $temp){
				$fI=new FarmerItem();
				$fI->setAmount($temp['amount']);
				$fI->setDate($d);
				$fI->setFarmerBelId($f);
				$fI->setQuantity($temp['quantity']);
				$fI->setItemCode($temp['itemCode']);
				$fI->setDesc($temp['description']);
				$fI->setReceipt($temp['receipt']);
				array_push($issues, $fI);
				unset($fI);

			}
			return $issues;
				
		}else return false;


	}
	

	public function saveFarmerItem(FarmerItem $f){

		$rows="itemCode,farmerBelongId,quantity,date,description,amount,receipt";
		$values=array($f->getItemCode(),$f->getFarmerBelId(),$f->getQuantity(),$f->getDate(),$f->getDesc(),$f->getAmount(),$f->getReceipt());
		
		$this->db->resetResult();

		if($this->db->insert("fm_farmerItem", $values,$rows)){
			return true;
		}else return false;


	}
	
	public function updateFarmerItem(FarmerItem $f){
		
		/*$set="itemCode='".$f->getItemCode()."',quantity='".$f->getQuantity()."',date='".$f->getDate()."',description='".$f->getDesc()."',amount='".$f->getAmount()."' , receipt='".$f->getReceipt()."'";
		
		$where="farmerBelongId='".$f->getFarmerBelId()."'";
		print $set ."<br>".$where;
		$this->db->resetResult();
		*/	
		
		if($this->deleteFarmerItem($f)){
			if($this->saveFarmerItem($f)){
				return true;
			}
			
		}else return false;


	}
	/*
	 * deleting the farmer item
	 */
	public function deleteFarmerItem(FarmerItem $item){
		$this->db->resetResult();
		if($this->db->delete("fm_farmerItem","farmerBelongId='".$item->getFarmerBelId()."' AND date='".$item->getDate()."' AND receipt='".$item->getReceipt()."'")){
			return true;
		}else return false;
	}
	/*
	 * for JSON call
	 */

	public function j_getAllIssues($nic,$center,$season,$date){

		$farmerBel=new FarmerBelongs();
		$farmerBel->setNic($nic);
		$farmerBel->setCenter($center);
		$farmerBel->setSeason($season);
		if($farmerBel->farmerBelongExist($farmerBel)){
			$fmBelId=$farmerBel->getFarmerBelong($nic, $season, $center)->getId();
			
			/*
			 * getting receipts issued on that day 
			 * 
			 */
			$this->db->resetResult();
			$this->db->select("fm_farmerItem","DISTINCT receipt","farmerBelongId='$fmBelId' AND date='$date'");
			$r=$this->db->getResult();
			
			$issues=array();
			
			if($r){
				/* for the receipt number there are issues*/
				foreach ($r as $temp){
					$receipt=$temp['receipt'];
					if(isset($date)){
						$this->db->select("fm_farmerItem","*","farmerBelongId='$fmBelId' AND date='$date' AND receipt='$receipt'");
					}else{
						$this->db->select("fm_farmerItem","*","farmerBelongId='$fmBelId' AND receipt='$receipt'","GROUP BY date");
					}
					$res=$this->db->getResult();
				
					if($res){
						array_push($issues, $res);
								
			
						}else return false;
							
				}
				return $issues;
				
			}else{
				//no issues
				return false;
			}
			
			
				
			
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

	public function getReceipt()
	{
		return $this->receipt;
	}

	public function setReceipt($receipt)
	{
		$this->receipt = $receipt;
	}

	public function getDesc()
	{
		return $this->desc;
	}

	public function setDesc($desc)
	{
		$this->desc = $desc;
	}

	public function getUnit()
	{
	    return $this->unit;
	}

	public function setUnit($unit)
	{
	    $this->unit = $unit;
	}
}



?>