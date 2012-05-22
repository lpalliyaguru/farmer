<?php


?>
<script type="text/javascript" src="libraries/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">


                   

$(document).ready(function(){

	//$('#menu').animateMenu({animatePadding: 30, defaultPadding:10});
	$.post("ajax_index.php",{"object":"support.login.HAuthenticator->","params":null},function(d){
		//res=jQuery.parseJSON(d);
		console.log(d.status);
		console.log(d.message);
		if(d.status){
			var n=d.body;
		
		}
		 });
	
});

</script>

<div id="login">


</div>
