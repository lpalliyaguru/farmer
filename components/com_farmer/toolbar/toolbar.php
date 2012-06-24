<?php

class ComToolBar extends ToolBar{
	
	//elements
	public $elements=array();
	
	
	public function ComToolBar(){
		
		
	}
	public function setElements(){
		$elems=array(	array("name"=>'add farmer',"type"=>_NEW,"link"=>"index.php?page=com_farmer&getAction=addFarmer",'onclick'=>""),
						array("name"=>'edit farmer',"type"=>_NEW,"link"=>"index.php?page=com_farmer&getAction=editFarmer",'onclick'=>""),
						array("name"=>'add farmer(season)',"type"=>_NEW,"link"=>"index.php?page=com_farmer&getAction=addFarmerforSeason",'onclick'=>""),
						array("name"=>'edit farmer(season)',"type"=>_NEW,"link"=>"index.php?page=com_farmer&getAction=getFarmersforSeason",'onclick'=>""),
						array("name"=>'save',"type"=>SAVE,"link"=>"#",'onclick'=>"saveFarmerForm()"),
	  					array("name"=>'cancel',"type"=>CANCEL,"link"=>"?page=com_farmer&getAction=editFarmer",'onclick'=>"")
	  				);
		
		$this->elements=$elems;
		
	}
	public function renderToolBar(){
		parent::renderToolBar();
	}
}




?>