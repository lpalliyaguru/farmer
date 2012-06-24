$('document').ready(function(){
	$('#farmer-bank').change(function(){
		var bank = $('#farmer-bank').val();
		
		$.post("ajax_index.php",{"object":"system.area.BankBranch->j_getBrancehsByBank","params":[bank]},function(d){
			arr=d['body'];
			if(arr != null){
				var options ="<option value='-1'>Select a Branch</option>";
				
				for(i=0; i< arr.length;i++){
					options += "<option value='"+ arr[i]['branchCode'] +"'>"+ arr[i]['branchName'] +"</option>";					
				}				
				
				$('#farmer-branch').html(options);
				
			}
		});	
		
	});
	
	$('#farmer-areaname').change(function(){
		var area = $('#farmer-areaname').val();
		
		$.post("ajax_index.php",{"object" : "system.area.Center->j_getCentersByArea","params" : [area]},function(d){
			var centers = d['body'];
			
			if(centers != null){
				var options ="<option value='-1'>Select a Center</option>";
				
				for(i=0; i< centers.length;i++){
					options += "<option value='"+ centers[i]['centerId'] +"'>"+ centers[i]['centerName'] +"</option>";					
				}				
				
				$('#farmer-centername').html(options);
				
			}
			
			
		});
		
	});
	
	
});

function saveFarmerDetails(){
var returnVal = true;

var farmerName = $('#farmer-name').val();
var farmerSurname = $('#farmer-surname').val();
var farmerNo = $('#farmer-no').val();
var farmerNic = $('#farmer-nic').val();
/*var farmerAddress = $('#farmer-address').val();
var farmerTelno = $('#farmer-telNo').val();
var farmerGender = $('#farmer-gen').val();
var farmerNation = $('#farmer-nation').val();
var farmerAcherage = $('#farmer-acher').val();
var farmerProcat = $('#farmer-procat').val();
var farmerBank = $('#farmer-bank').val();
var farmerBranch = $('#farmer-branch').val();
var farmerAccno = $('#farmer-acc').val();
var farmerAccHolder = $('#farmer-acchol').val();
*/


if(farmerName == ""){	
	$('#err-farmer-name').remove ();
	$('#farmer-name').parent().append("<span id='err-farmer-name'>* required</span>");
	returnVal = false;
}
else{
	$('#err-farmer-name').remove ();
	
}
if(farmerSurname == ""){	
	$('#err-farmer-surname').remove();
	$('#farmer-surname').parent().append("<span id='err-farmer-surname'>* required</span>");
	returnVal = false;
}
else{
	$('#err-farmer-surname').hide();
	
}
if(farmerNo == ""){	
	$('#err-farmer-no').remove ();
	$('#farmer-no').parent().append("<span id='err-farmer-no'>* required</span>");
	returnVal = false;
}
else{
	$('#err-farmer-no').remove ();
	
}
if(farmerNic == ""){	
	$('#err-farmer-nic').remove ();
	$('#farmer-nic').parent().append("<span id='err-farmer-nic'>* required</span>");
	returnVal = false;
}
else{
	$('#err-farmer-nic').remove ();
	
}


return returnVal;

}

function saveFarmerforSeasonDetails(){
	var returnValue = true;
	
	var nic = $('#farmer-nic').val();
	var season = $('#farmer-season').val();
	var center = $('#farmer-centername').val();
	
	if(nic == ""){
		$('#err-farmer-nic').remove();
		$('#farmer-nic').parent().append("<span id='err-farmer-nic'>* required</span>");
		returnValue = false;
	}else $('#err-farmer-nic').remove();
	
	if(season == -1){
		$('#err-farmer-season').remove();
		$('#farmer-season').parent().append("<span id='err-farmer-season'>* required</span>");
	}else $('#err-farmer-season').remove();
	
	if(center == -1){
		$('#err-farmer-centername').remove();
		$('#farmer-centername').parent().append("<span id='err-farmer-centername'>* required</span>");
	}else $('#err-farmer-centername').remove();
	
	return returnValue;	
	
}



