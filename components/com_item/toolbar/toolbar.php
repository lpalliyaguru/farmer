<?php

class ComToolBar extends ToolBar{
	
	//elements
	public $elements=array();
	
	
	public function ComToolBar(){
		
		
	}
	public function setElements(){
		$elems=array(	array("name"=>'view issue',"type"=>VIEW,"link"=>"index.php?page=com_item&getAction=viewitemissues",'onclick'=>""),
						array("name"=>'issue item',"type"=>_NEW,"link"=>"index.php?page=com_item&getAction=issueitem",'onclick'=>""),
						array("name"=>'add item',"type"=>_NEW,"link"=>"index.php?page=com_item&getAction=add",'onclick'=>""),
						array("name"=>'save',"type"=>SAVE,"link"=>"#",'onclick'=>"saveForm()"),
						array("name"=>'view all',"type"=>VIEW,"link"=>"?page=com_item&getAction=view",'onclick'=>""),
	  					array("name"=>'cancel',"type"=>CANCEL,"link"=>"?page=com_item&getAction=view",'onclick'=>"")
	  				);
		
		$this->elements=$elems;
		
	}
	public function renderToolBar(){
		parent::renderToolBar();
	}
}




?>