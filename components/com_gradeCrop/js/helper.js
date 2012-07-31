/**
 * helper.js. Basically doing validation part of the view of gradeCrop component
 */
//document ready function for autocomplete functions 

$(document).ready(function(){
	
	$('#id-gradecrop-area').autocomplete({
		source:getAreas(),
		select:function(event,ui){
			$(this).val(ui.item.label);
			$('#id-hidden-gradecrop-area').val(ui.item.value);
			/*
			 * generate the insertion table according to number of sub grades
			 */
			$('#id-gradecrop-center').autocomplete({
				source:getCenters(),
				select:function(event,ui){
					$(this).val(ui.item.label);
					$('#id-hidden-gradecrop-center').val(ui.item.value);
					/*
					 * generate the insertion table according to number of sub grades
					 */
				
					
					return false;
				}
				
			});
			
			return false;
		}
		
	});
	
	//
	
	
	
	
});



/*
 * this function is should be called if number of grades are gonna deferantiated.@this time we think 
 * there are only 6 grades & they are not variating project wise.
 */

function generateTable(value){
	
	var tbl_str="<table border='1' cellspacing='0' cellpadding='0'>";
	tbl_str+="<tr></tr>";
	tbl_str+="</table>";
	
	
	
}

function getAreas(){
	var result;
	$.ajax({
		url:"ajax_index.php",
		type:'post',
		dataType:"json",
		data:{'object':"system.area.Area->j_getAll",'params':null},
		async:false,
		success:function(d){
			// result=jQuery.parseJSON(d);
			if(d.status=='true'){
		 		result=d.body;
		 		
		 	}else{
		 		
		 	}
			}
	
	});
	return result;
		
}
function getCenters(){
	var result;
	var area=$('#id-hidden-gradecrop-area').val();
	$.ajax({
		url:"ajax_index.php",
		type:'post',
		dataType:"json",
		data:{'object':"system.area.Center->j_getCentersByArea",'params':[area]},
		async:false,
		success:function(d){
			// result=jQuery.parseJSON(d);
			if(d.status=='true'){
		 		result=d.body;
		 		console.log(area);
		 	}else{
		 		
		 	}
			}
	
	});
	return result;
		
}

function validateForm() {
	
	
	
	
	
	
	
}

