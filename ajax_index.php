<?php
/*
 * starting the session 
 */
session_start();
/*
 * requiring the caller
 */
require_once 'includes/call.php';
/*
 * importing class logger
 */
hImport("core.db.HDatabase");


/*
 * sample call
 * $.post("ajax_index.php",{"object":"core.logger->getLogger","params":["param1":"param2","param3"]},function(d){
 * 		
 * });
 * 
 * this ajax call should be authenticated by using key authentication.this will be done in the next 
 * stage .@ the moment we are not considering that issue.
 */

/*
 * checking auth
 */

	if(auth()){
		/* checking the parameter type object */
		if(getParam('object')){
			/* setting object  */
			
			$objUrl=getParam("object");
			
			/* splitting the url  */
			
			$urlArray=explode("->", $objUrl);
			/*
			 * extract the class url for hImport function
			 */
			$classUrl=$urlArray[0];
			/*
			 * split the class url and get the class name
			 */
			$parts=explode(".", $classUrl);
			$class=array_pop($parts);
			/*
			 * sets the function name
			 */
			$func=$urlArray[1];
				
			/*
			 * importing the package using the class url and checks class existance
			 */
			
			if(hImport($classUrl)){
				
				$obj=new $class;
				
				/*
				 * checking is function empty or null
				 */
				
				if($func!=null || $func!=""){
					
					/* checking params is set*/
					if(getParam('params')!="null"){
						/* calling user_func and set the return value*/
						$params=getParam('params');
					
						$return_value= call_user_func_array(array($obj, $func), $params);
					
					}else{
						/* null parameters ,call directly method */
						$return_value=$obj->$func();
						
					}
					//$log->ajaxLog("sdsd", json_encode($value)$return_value);
					//print_r(objectArray($return_value));
					
					$return=array("status"=>"true","message"=>"accepted","body"=>$return_value);
					//$return=(array)$return_value;
					/*
					 * setting the header to json output
					 */
					header("Content-type:application/json");
					/*
					 * output the result
					 */
					print json_encode($return);
					
				}else{
					/*
					 * null or empty method exception
					 */
					header("Content-type:application/json");
					$return=array("status"=>"false","message"=>"Cannot find the null or empty method");
					print json_encode($return);
				}
				
						
			}else{
				/*
				 * wrong class request
				 */
				header("Content-type:application/json");
				$return=array("status"=>"false","message"=>"Cannot find the class");
				print json_encode($return);
				
			}
			
			
		}else{
			
			
		}
	}else{
		/*
		 * not an authenticated request 
		 */
		header("Content-type:application/json");
		$return=array("status"=>"false","message"=>"Restricted Access");
		print json_encode($return);
		
	}


function objectArray( $object ) {

    if ( is_array( $object ))
        return $object ;
        
    if ( !is_object( $object ))
        return false ;
    print_r(get_class($object)) ;  
    $serial = serialize( $object ) ;
    $serial = preg_replace( '/O:\d+:".+?"/' ,'a' , $serial ) ;
    if( preg_match_all( '/s:\d+:"\\0.+?\\0(.+?)"/' , $serial, $ms, PREG_SET_ORDER )) {
        foreach( $ms as $m ) {
            $serial = str_replace( $m[0], 's:'. strlen( $m[1] ) . ':"'.$m[1] . '"', $serial ) ;
        }
    }
    
    return @unserialize( $serial ) ;

}


?>

	
