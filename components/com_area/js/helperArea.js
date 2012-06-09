/*
 * 
 */
function validateAreaform(){
	if($('#id-area-id').val()=='' || $('#id-area-name').val()=='' || $('#name-area-exec').val()<0 ){
		alert("Please fill the form correctly");
		return false;
	}else return true;
	
}
function saveAreaForm(){
	if(validateAreaform()){
		$('#form-area').submit();
	}else{
		return false;
	}
	
	
}

function confirmAreaDelete(){
	
	if(confirm("Are you sure ?")){
		return true;
		
	}else return false;
	
}



