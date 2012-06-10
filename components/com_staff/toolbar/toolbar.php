<?php

class ComToolBar extends ToolBar{
	
	//elements
	public $elements=array();
	
	
	public function ComToolBar(){
		
		
	}
	public function setElements(){
		$elems=array(	array("name"=>'view all',"type"=>VIEW,"link"=>"index.php?page=com_staff&getAction=view",'onclick'=>""),
						array("name"=>'add user',"type"=>_NEW,"link"=>"index.php?page=com_staff&getAction=adduser",'onclick'=>""),
						array("name"=>'save',"type"=>SAVE,"link"=>"#",'onclick'=>"saveForm()"),
	  					array("name"=>'cancel',"type"=>CANCEL,"link"=>"?page=com_staff&getAction=view",'onclick'=>"")
	  				);
		
		$this->elements=$elems;
		
	}
	public function renderToolBar(){
		parent::renderToolBar();
	}
}




?>