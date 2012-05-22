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