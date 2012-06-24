<script>
/*
$.post("ajax_index.php",{"object":"system.area.BankBranch->j_getBrancehsByBank","params":["sfsdfs"]},function(d){
			arr=d['body'];
			console.log(arr);

	  });


*/
$.get("ajax_index.php?object=system.area.BankBranch->j_getBrancehsByBank&params[]=sfsdfs",function(d){
	arr=d['body'];
	console.log(arr);

});

</script>
<?php 

hImport("system.grade.Grade");

$g=new Grade();

$grade=$g->getGrade("232", "232", "123")->getIn_allowance();

?>