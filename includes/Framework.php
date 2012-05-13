<?php 

function hImport($url){
	
	$ex_url=explode(".", $url);
	$URL=implode(DS, $ex_url);
	$URL="includes".DS.$URL.".php";
	require_once ($URL);
	
}
function auth(){
	
	if(isset($_SESSION['SESS_MEMBER_ID'])){
		return TRUE;
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


?>