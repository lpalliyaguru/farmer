
<script type="text/javascript" src="libraries/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="libraries/js/jquery.cookie.js"></script>

<script type="text/javascript" >
$(document).ready(function(){
	/*
	$.ajax({
		url:"ajax_index.php",
		type:'post',
		data:{"object":"system.farmer.Farmer->getFarmerByNIC","params":["882569855"]},
		async:false,
		success:function(d){
			alert(d);
				console.log(d);
			}				

		});

	$.post("ajax_index.php",{"object":"system.farmer.Farmer->getFarmerByNIC","params":"882569855"},function(d){
		 	console.log(d);
		  });*/
	$.post("ajax_index.php",{"object":"system.farmer.Farmer->getFarmerByNIC","params":['882569855']},function(d){
		 	
		 		console.log(d);
		 });
		
});





</script>

<form action="ajax_index.php" method="post">
<input type="text" name='pa'>


<input type="submit">

</form>


