<?php

import("HTML_renderer");

/*
 * getting getAction to redirect page
 */

if($action=getParam("getAction")){
	switch ($action){
		case "addcrop":
			HTML_renderer::addcrop();
			break;
	}
	
	
	
	
}





?>