<?php
class MainFrame{
	
	private $activatedComponent=null;
	private $activatedModule=null;
	
	
	
	public function MainFrame(){
		
		
	}
	
	public function redirect($url,$message,$type){
		$post="headerpost=".$message;
		//if($type=='SUCCESS'){
			
			header("Location:$url");
			header($post);
		//}
		
	}
	
	public function activateComponent($comp){
		
		$this->activatedComponent=$comp;
		$this->importAllJs("compo",$comp);
		$this->importAllCss("compo",$comp);
		
		
	}
	public function activateModule($mod){
		$this->importAllJs("modu",$mod);
		$this->importAllCss("modu",$mod);
		$this->activatedModule=$mod;
				
	}
	public function getActivatedComponent(){
		
		$page=getParam("page");
		return  $page;
				
	}
	public function getActivatedModule(){
		
		return $this->activatedModule;
		
	}
	
	public function importAllJs($type,$dir){
		$dir_path;
			if($type=='compo'){
				$dir_path="components/com_".$dir."/js";
			}else if($type=='modu'){
				$dir_path="modules/mod_".$dir."/js";
			}
		if(is_dir($dir_path)){
			
			if($handle=opendir($dir_path)){
					while(false!==($entry=readdir($handle))){
						/*
						 * getting the extensions
						 */
						$e=explode(".", $entry);
						$ext=array_pop($e);
						
						if($ext=='js'){
							/* import the js file */
							print "<script type='text/javascript' src='".$dir_path."/".$entry."'></script>";
						}else{
							/*
							 * just skip the step
							 */
						}
					}
					
				}else{
					
					return false;
				}
		}	else {
			
			return false;
			
		}
		
		
		
	}
	
public function importAllCss($type,$dir){
		$dir_path;
			if($type=='compo'){
				$dir_path="components/com_".$dir."/css";
			}else if($type=='modu'){
				$dir_path="modules/mod_".$dir."/css";
			}
			
		if($handle=opendir($dir_path)){
				while(false!==($entry=readdir($handle))){
					/*
					 * getting the extensions
					 */
					$e=explode(".", $entry);
					$ext=array_pop($e);
					
					if($ext=='css'){
						/* import the js file */
						print "<link rel='stylesheet'  type='text/css' href='".$dir_path."/".$entry."'/>";
					}else{
						/*
						 * just skip the step
						 */
					}
				}
				
			}else{
				
				return false;
			}
		
		
	}
	
	
	
}





?>