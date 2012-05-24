<?php

class ToolBar{
	
	private $id;
	protected  $elements=array();
	/*
	 * $elements=array(array("name"=>'name',"type"=>TYPE,"link"=>LINK,'onclick'=>ONCLICK),
	 * 					array(array("name"=>'name',"type"=>TYPE,"link"=>LINK,'onclick'=>ONCLICK))
	 * 				);
	 * 
	 * 
	 * 
	 * 
	 */
	public function ToolBar(){
		
	}
	public function renderToolBar(){
		$menu="";
		$menu.="<ul id='default-ribbon-menu'>";
		
		foreach ($this->elements as $temp){
			$menu.="<li>";
			$menu.="<a><div class='".$temp['type']."'><div>".$temp['name']."</a>";
			$menu.="</a></li>";
		}
		$menu.="</ul>";
		
		print $menu;
	}
	public function setElements($elems){
		
		$this->elements=$elems;
	}
	public function getElements(){
		
		return $this->elements;
	}
}




?>