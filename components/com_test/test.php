<script>

$.post("ajax_index.php",{"object":"system.area.BankBranch->j_getBrancehsByBank","params":["dfd "]},function(d){
			arr=d['body'];
			console.log(arr);
});

</script>
