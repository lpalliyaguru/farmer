<?php

class ComToolBar extends ToolBar{
	
	//elements
	public $elements=array();
	
	
	public function ComToolBar(){
		
		
	}
	public function setElements(){
		$elems=array(	array("name"=>'add bank',"type"=>_NEW,"link"=>"index.php?page=com_bank&getAction=add",'onclick'=>""),
						array("name"=>'add Branch',"type"=>_NEW,"link"=>"index.php?page=com_bank&getAction=addBranch",'onclick'=>""),
						array("name"=>'save',"type"=>SAVE,"link"=>"#",'onclick'=>"saveBankForm()"),
	  					array("name"=>'cancel',"type"=>CANCEL,"link"=>"?page=com_bank&getAction=view",'onclick'=>"")
	  				);
		
		$this->elements=$elems;
		
	}
	public function renderToolBar(){
		parent::renderToolBar();
	}
}




?>