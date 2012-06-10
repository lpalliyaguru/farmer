/**
 * 
 */
function validateBankform(){
	if($('#id-bank-id').val()=='' || $('#id-bank-name').val()=='' ){
		alert("Please fill the form correctly");
		return false;
	}else return true;
	
}
/*
function saveBankForm(){
	if(validateBankform()){
		$('#form-bank').submit();
	}else{
		return false;
	}
	
	
}

*/
function validateBankBranchform(){

	if($('#id-bankbranch-id').val()=='' || $('#id-bankbranch-name').val()=='' || $('#id-bankbranch-bank').val()==-1 ){
		alert("Please fill the form correctly");
		return false;
	}else return true;
	
}

function saveBankForm(){
	
	if($('#form-bankbranch').size()){
		
		if(validateBankBranchform()>0){
			$('#form-bankbranch').submit();
		}else{
			return false;
		}
	}else if($('#form-bank').size()){
		if(validateBankform()){
			$('#form-bank').submit();
		}else{
			return false;
		}
		
	}
	
	
	
}

function confirmDelete(){
	
	if(confirm("All branches data belong to this bank will be deleted.\nAre you sure?")){
		return true;
	}else return false;
}


