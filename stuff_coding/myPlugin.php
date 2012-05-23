
<link rel="stylesheet" href="dforz.table.css.1.0.0.css" type="text/css"/>

<script type="text/javascript" src="../libraries/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript">

(function(){
	var default_setting={
		rows:4,
		cols:10,
		border:1,
		cellpadding:0,
		cellspacing:0,
		id:'default-table-id',
		class:'default-table-class',
		margin:5
		};

	$.fn.dforzTable=function(options,con){
		//this.fadeOut(3000);
		var settings=$.extend(options,default_setting);
			table=$('<table>').attr('border',settings.border)
					.attr('cellpadding',settings.cellpadding)
					.attr('cellspacing',settings.cellspacing)
					.attr('id',settings.id)
					.attr('class',settings.class)
					.attr('style','margin:'+settings.margin);
			
			
		for(var i=0;i<con.length;i++){
					tr=$('<tr>');
					for(var j=0;j<con[i].length;j++){
						td=$('<td>');
						td.append(con[i][j]);
						tr.append(td);
						}
					
					table.append(tr);
					
				}
		this.append(table);
		this.append("<p>Click<p>").bind('click',function(){
				table.append('<tr>');
			});

		};
})(jQuery)



$(document).ready(function(){
	
	var content=Array();
		for(i=0;i<4;i++){
			content[i]=Array();
			for(j=0;j<4;j++){
				content[i][j]="<p>row-"+i+" column- "+j+"<p>";
				}
			
			}
	
	$('#target').dforzTable({border:1},content); 
	
});






</script>
<p id="target">I'm testing your jQuery plugin</p>


