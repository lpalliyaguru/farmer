<?php


?>
<script type="text/javascript" src="libraries/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">


                   

$(document).ready(function(){

	
	$.post("ajax_index.php",{"object":"support.login.HAuthenticator->getLoginForm","params":null},function(d){
		
		console.log("status: " +d.status);
		console.log("message: "+d.message);
		console.log("body : "+d.body);
		$('#login').html(d.body)
		if(d.status){
			var n=d.body;
		
		}
		 });
	
});

</script>

<div id="login">


</div>
