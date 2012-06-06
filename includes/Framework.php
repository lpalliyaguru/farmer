<?php 

	function hImport($url){
		
		$ex_url=explode(".", $url);
		$URL=implode(DS, $ex_url);
		$URL="includes".DS.$URL.".php";
		
		if(file_exists($URL)){
			
			require_once ($URL);
			return true;
		}else{
			return false;
		}
		
	}
	function auth(){
		
		if(isset($_SESSION['SESS_MEMBER_ID'])){
			return true;
		}else return false;
	}

	function getParam($param){
		/*  
		 * to be well handled in later 
		 */
		 if(isset($_REQUEST[$param])){
		 	return $_REQUEST[$param];
		 }else return false;
		
	}
	
	function import($class){
		
		$com=getParam("page");
		
		if($com){
			$p=explode("_", $com);
			$type=$p[0];
			$val=$p[1];
			$base="";
			if($type=='com'){
				$base="components/";
				
			}else if($type=='mod'){
				$base="modules/";
				
			}
			if(is_dir($base.$com."/html")){
				if(is_file($base.$com."/html/".$class.".php")){
					require_once $base.$com."/html/".$class.".php";
					
				}else {
					
					return false;
				}
			}else {
				
				return false;
			}
			
		}return false;
		
		
	}
	
	function importJs($url){
		
		$js_url="libraries/js/".$url.".js";
		
		
		print "<script type='text/javascript' src='".$js_url."'><script>";
		
	}

	function importCSS($url){
		
		
		
	}
	function setTitle($title){
		
		print "<script type='text/javascript'>";
		print "document.title='$title'";
		
		
		print "</script>";
		
		
	}


?>