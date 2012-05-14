<?php

class Template{
	private $id;
	private $name;
	private $default;
	
	
	public function Template(){
		
		
		
	}
	public function setTmplId($id){
		$this->id=$id;
	}
	public function setTmplName($name){
		$this->name=$name;
	}
	public function setTmplDefault($def){
		$this->default=$def;
	}
	public function getTmplId(){
		return $this->id;
	}
	public function getTmplName(){
		return $this->name;
	}
	public function getTmplDefault(){
		return $this->default;
	}
	
}

?>