<?php


?>
<script type="text/javascript" src="libraries/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">


                   

$(document).ready(function(){

	//$('#menu').animateMenu({animatePadding: 30, defaultPadding:10});
	$.post("ajax_index.php",{"object":"core.Logger->seyIt","params":["param1","param2"]},function(d){
		//res=jQuery.parseJSON(d);
		console.log(d.message);
		 });
	
});

</script>
<p id="fader"> I'm goon fade in</p>

<p>newly Added</p>


