/**
 * 
 */

function saveForm(){
	if($('#form-user').size()>0){
	
		$('#form-user').submit();
		
	}
	
}

function validateStaffform(){
	flag=true;
	$('.class-user').each(function(){
		if($(this).val()==''){
			flag=false;
		}else{
			flag=true;
		}
		
	});
	if($('#id-user-type').val()<0){
		flag=false;
	}
	if(!flag){
		alert("Please fill the form correctly.");
		
	}
	return flag;
}


function confirmDelete(){
	
	if(confirm("User will be deleted permanently.\nAre you sure?")){
		return true;
	}else return false;
}