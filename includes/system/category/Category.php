<?php

class Category{

	private $categoryId;
	private $categoryName;
	private $db;

	public function Category(){
		$this->db = new HDatabase();
		$this->db->connect();
	}

	public function getCategories(){
		$this->db->resetResult();
		$this->db->select('fm_cropCategory','*');
		$res = $this->db->getResult();
		if($res){
			return $res;
		}else{
			return false;
		}
	}

	public function getCategoryNameById($categoryId){
		$this->db->resetResult();
		$this->db->select('fm_cropCategory','description',"categoryCode='$categoryId'");
		$res = $this->db->getResult();
		if($res){
			$categoryName = $res[0]['description'];
			return $categoryName;
		}else{
			return false;
		}
	}

	public function getCategoryId()
	{
		return $this->categoryId;
	}

	public function setCategoryId($categoryId)
	{
		$this->categoryId = $categoryId;
	}

	public function getCategoryName()
	{
		return $this->categoryName;
	}

	public function setCategoryName($categoryName)
	{
		$this->categoryName = $categoryName;
	}
}



?>