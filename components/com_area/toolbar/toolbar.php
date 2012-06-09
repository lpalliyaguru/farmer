<?php

class ComToolBar extends ToolBar{
	
	//elements
	public $elements=array();
	
	
	public function ComToolBar(){
		
		
	}
	public function setElements(){
		$elems=array(	array("name"=>'Add Area',"type"=>_NEW,"link"=>"?page=com_area&getAction=add",'onclick'=>""),
						array("name"=>'save',"type"=>SAVE,"link"=>"#",'onclick'=>"saveAreaForm()"),
	  					array("name"=>'cancel',"type"=>CANCEL,"link"=>"?page=com_area&getAction=view",'onclick'=>"")
	  				);
		
		$this->elements=$elems;
		
	}
	public function renderToolBar(){
		parent::renderToolBar();
	}
}




?>