<?php
class MainFrame{
	
	private $activatedComponent=null;
	private $activatedModule=null;
	
	
	
	public function MainFrame(){
		
		
	}
	
	public function redirect($message,$url=""){
		
		global $log;
		$log->log("manoj", $message);
		
	}
	
	public function activateComponent($comp){
		
		$this->activatedComponent=$comp;
				
	}
	public function activateModule($mod){
		
		$this->activatedComponent=$mod;
				
	}
	public function getActivatedComponent(){
		
		$page=getParam("page");
		return  $page;
				
	}
	public function getActivatedModule(){
		
		return $this->activatedModule;
		
	}
	
	
	
	
	
	
	
}





?>