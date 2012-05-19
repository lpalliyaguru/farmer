<?php

hImport("core.var.Variable");

class StringHelper implements Variable{
	
	public function StringHelper(){
		
		
	}
	function cleanString($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	
	
}




?>