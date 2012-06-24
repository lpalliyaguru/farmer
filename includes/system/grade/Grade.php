<?php

class Grade{
	private $id;
	private $cate;
	private $area;
	private $description;
	private $unitPrice;
	private $in_percentage;
	private $in_allowance;
	/*
	 * gradecol field is collided
	 */
	private $gradeCol;
	/*
	 * db instance
	 */
	private $db;
	public function Grade(){
		$this->db=new HDatabase();
		$this->db->connect();
		
	}
	public function getAll(){
		
		$this->db->resetResult();
		$this->db->select("fm_grade","*");
		$res=$this->db->getResult();
		if($res){
			$grades=array();
			foreach ($res as $temp){
				$g=new Grade();
				$g->setId($temp["gradeCode"]);
				$g->setCate($temp["categoryCode"]);
				$g->setArea($temp["areaId"]);
				$g->setDescription($temp["description"]);
				$g->setUnitPrice($temp["unitPrice"]);
				$g->setIn_percentage($temp["in_percentage"]);
				$g->setIn_allowance($temp["in_allowance"]);
				array_push($grades, $g);
			}
			return $grades;
			
		}return false;
		
	}
	
	public function getGrade($area,$cate,$id){
		
		$this->db->resetResult();
		$this->db->select("fm_grade","*","areaId='".$area."' AND categoryCode='".$cate."' AND gradeCode='".$id."'");
		$res=$this->db->getResult();
		if($res){
			
			
				$g=new Grade();
				$g->setId($res[0]["gradeCode"]);
				$g->setCate($res[0]["categoryCode"]);
				$g->setArea($res[0]["areaId"]);
				$g->setDescription($res[0]["description"]);
				$g->setUnitPrice($res[0]["unitPrice"]);
				$g->setIn_percentage($res[0]["in_percentage"]);
				$g->setIn_allowance($res[0]["in_allowance"]);
			
			
			return $g;
			
		}return false;
		
	}
	
	public function save(){
		
		$rows="gradeCode,areaId,categoryCode,description,unitPrice,in_percentage,in_allowance";
		$values=array(	$this->getId(),$this->getArea(),$this->getCate(),
						$this->getDescription(),$this->getUnitPrice(),
						$this->getIn_percentage(),$this->getIn_allowance()		
			);
		
		$this->db->resetResult();
		if($this->db->insert("fm_grade", $values,$rows)){
			return true;
		}else {
			return false;
		}
		
	}
	
	public function delete(){
		$this->db->resetResult();
		$where="gradeCode='".$this->getId()."' AND areaId='".$this->getArea()."' AND categoryCode='".$this->getCate()."'";
		if($this->db->delete("fm_grade",$where)){
			return true;
			
		}else{
			return false;
		}
		
		
	}
	public function update(){
		$this->db->resetResult();
		$set="description='".$this->getDescription()."' ,unitPrice='".$this->getUnitPrice()."',in_percentage='".$this->getIn_percentage()."',in_allowance='".$this->getIn_allowance()."'";
		$where="gradeCode='".$this->getId()."' AND areaId='".$this->getArea()."' AND categoryCode='".$this->getCate()."'";
		if($this->db->update("fm_grade", $set, $where)){
			return true;
			
		}else return false;
		
	}
	

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getCate()
	{
	    return $this->cate;
	}

	public function setCate($cate)
	{
	    $this->cate = $cate;
	}

	public function getArea()
	{
	    return $this->area;
	}

	public function setArea($area)
	{
	    $this->area = $area;
	}

	public function getDescription()
	{
	    return $this->description;
	}

	public function setDescription($description)
	{
	    $this->description = $description;
	}

	public function getUnitPrice()
	{
	    return $this->unitPrice;
	}

	public function setUnitPrice($unitPrice)
	{
	    $this->unitPrice = $unitPrice;
	}

	public function getIn_percentage()
	{
	    return $this->in_percentage;
	}

	public function setIn_percentage($in_percentage)
	{
	    $this->in_percentage = $in_percentage;
	}

	public function getIn_allowance()
	{
	    return $this->in_allowance;
	}

	public function setIn_allowance($in_allowance)
	{
	    $this->in_allowance = $in_allowance;
	}

	public function getGradeCol()
	{
	    return $this->gradeCol;
	}

	public function setGradeCol($gradeCol)
	{
	    $this->gradeCol = $gradeCol;
	}
}




?>