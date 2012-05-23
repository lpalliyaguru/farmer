<?php

class ComToolBar extends ToolBar{
	
	//elements
	public $elements=array();
	
	
	public function ComToolBar(){
		
		
	}
	public function setElements(){
		$elems=array(array("name"=>'save',"type"=>SAVE,"link"=>"index.php?option=save",'onclick'=>"alert('save')"),
	  					array("name"=>'cancel',"type"=>CANCEL,"link"=>"index.php?option=cancel",'onclick'=>"alert('cancel')")
	  				);
		
		$this->elements=$elems;
		
	}
	public function renderToolBar(){
		parent::renderToolBar();
	}
}




?>