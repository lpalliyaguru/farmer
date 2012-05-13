<?php

class Logger{
	
	private $logs=array();
	
	public function Logger(){
		
	}
	public function log($tag,$message){
		array_push($this->logs, array("tag"=>$tag,'message'=>$message));
		
	}
	public function printLog(){
		if(!empty($this->logs)){
		foreach ($this->logs as $value) {
			print "<strong>".$value['tag']." :  </strong>  ".$value['message'];
			print "<br>";
		}
		}else print "No Logs";
		
	}
	public function getLoggerStatus(){
		/* get the config */
		
		if(LOG=="true"){
			return true;
			
		}else return false;
	}
	public function clearLog(){
		$this->logs=null;
	}
	
}



?>