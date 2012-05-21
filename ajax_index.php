<?php
require_once 'includes/call.php';
hImport("core.Logger");


/*
 * sample call
 * $.post("ajax_index.php",{"object":"core.logger->getLogger","params":["param1":"param2","param3"]},function(d){
 * 		use d
 * });
 * 
 */
$log=new Logger();
if(getParam('object')){
	$objUrl=getParam("object");
	$urlArray=explode("->", $objUrl);
	$classUrl=$urlArray[0];
	$parts=explode(".", $classUrl);
	$class=array_pop($parts);
	$func=$urlArray[1];

	$params=getParam('params');
	hImport($classUrl);
	
	$obj=new $class;
		
	print call_user_func_array(array($obj, $func), $params);
	//$obj->$func();
	

	
	
	
	
	
	
}





?>

	