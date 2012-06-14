$('document').ready(function(){
	$('#farmer-bank').change(function(){
		var bank = $('#farmer-bank').val();
		
		$.post("ajax_index.php",{"object": "system.area.BankBranch->getBankByCode()","params":[bank]},function(data){
			
			var res = jQuery.parseJSON(data);
			
			alert(res);
			
		});
		
		
	});
	
	
});

function saveFarmerDetails(){
var returnVal = true;
	
var farmerName = $('#farmer-name').val();
var farmerSurname = $('#farmer-surname').val();
var farmerNo = $('#farmer-no').val();
var farmerArea = $('#farmer-areaname').val();
var farmerCenter = $('#farmer-centername').val();
var farmerAddress = $('#farmer-address').val();
var farmerTelno = $('#farmer-telNo').val();
var farmerGender = $('#farmer-gen').val();
var farmerNic = $('#farmer-nic').val();
var farmerNation = $('#farmer-nation').val();
var farmerAcherage = $('#farmer-acher').val();
var farmerProcat = $('#farmer-procat').val();
var farmerBank = $('#farmer-bank').val();
var farmerBranch = $('#farmer-branch').val();
var farmerAccno = $('#farmer-acc').val();
var farmerAccHolder = $('#farmer-acchol').val();

returnVal = returnVal && formValidator(farmerName,'#farmer-name');
returnVal = returnVal && formValidator(farmerSurname,'#farmer-surname');
returnVal = returnVal && formValidator(farmerNo,'#farmer-no');
returnVal = returnVal && nicValidator(farmerNic,"#farmer-nic");


return returnVal;
}

function formValidator( validData,id){
	if(validData == ""){
		$(id).parent().append("<span>* required</span>");
		return false;
	}else{
		
		return true;
	}	
}

function nicValidator(validData,id){
	if(validData == ""){
		$(id).parent().append("<span>* required</span>");
		return false;
	}else{		
		
		return true;
	}	
}


