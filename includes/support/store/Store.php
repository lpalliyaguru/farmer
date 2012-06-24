<?php

class Store {
	
	private $store=array();
	
	public function Store(){
		
		
	}
	public function setObject($name,$object){
		
		$this->store[$name]=$object;
		
	}
	public function save(){
		 

  			$fh = fopen('cache/log.txt', 'a') or die("Can't open file.");

  // output the value as a variable by setting the 2nd parameter to true

  			
			fwrite($fh, serialize($this->store));
			fclose($fh);
		
	}
	
	public function getObject($name){
		
		
		
		$d=unserialize(file_get_contents("cache/log.txt"));
		
		return $d;
		/*
		if(isset($d[$name])){
			return $d[$name];
		}else{
			return false;
		}
		*/
	}
	public function get($name){
		
		return $this->store[$name];
	}
}


?>