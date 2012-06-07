<?php

class ComToolBar extends ToolBar{
	
	//elements
	public $elements=array();
	
	
	public function ComToolBar(){
		
		
	}
	public function setElements(){
		$elems=array(array("name"=>'save',"type"=>SAVE,"link"=>"#",'onclick'=>"saveCenterForm()"),
	  					array("name"=>'cancel',"type"=>CANCEL,"link"=>"?page=com_center&getAction=view",'onclick'=>"")
	  				);
		
		$this->elements=$elems;
		
	}
	public function renderToolBar(){
		parent::renderToolBar();
	}
}




?>