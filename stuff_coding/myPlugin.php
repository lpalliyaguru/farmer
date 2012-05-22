<script type="text/javascript" src="../libraries/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript">

(function(){
	var settings=$.extend({
		rows:4,
		cols:10,
		border:1
		});

	$.fn.myTablePlugin=function(){
		//this.fadeOut(3000);
			table=$('<table>').attr('border',settings.border);
			
		for(var i=0;i<settings.rows;i++){
					tr=$('<tr>');
					for(var j=0;j<settings.cols;j++){
						tr.append('<td>');
						//console.log('i:'+i +" j:"+j);
						}
					console.log(tr);
					table.append(tr);
				}
		this.append(table);

		};
})(jQuery)



$(document).ready(function(){
	$('#target').myTablePlugin(); 
	
});






</script>
<p id="target">I'm testing your jQuery plugin</p>


