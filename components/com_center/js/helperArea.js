/**
 * 
 */
function validateCenterform(){
	if($('#id-center-id').val()=='' || $('#id-center-name').val()=='' || $('#name-center-exec').val()<0 || $('#name-center-area').val()<0 ){
		alert("Please fill the form correctly");
		return false;
	}else return true;
	
}
function saveCenterForm(){
	if(validateCenterform()){
		$('#form-center').submit();
	}else{
		return false;
	}
	
	
}



