
$(document).ready(function(){
	/*this is date picker*/
	$('#id-itemissue-1-date').datepicker({dateFormat: 'yy-mm-dd'});
	
	
	
});

function validateitemform() {
	flag=true;
	$('.class-item').each(function(){
		if($(this).val()==''){
			flag=false;
		}else{
			flag=true;
		}
		
	});
	if(!flag){
		alert('Please fill the form correctly!');
	}
	return flag;
	
}

function saveForm() {
	
	if($('#form-item').size()>0){
		if(validateitemform()){
			$('#form-item').submit();
		}
	}else if($('#form-itemIssue').size()>0){
		if(validateItemIssueForm()){
			$('#form-itemIssue').submit();
		}
		
	}
	
	
}

function confirmDelete(){
	
	if(confirm("Item data will be deleted.\nAre you sure?")){
		return true;
	}else return false;
}

/*
 * item issue table scriptings 
 * 
 */

function addRowtoTable(id){
	numOfRows=$('#'+id+" tr").length;
	str="<tr>";
	for(i=0;i<6;i++){
		str+="<td align='center'><input type='text' id='id-itemissue-"+(numOfRows-1)+"-"+i+"' name='name-itemissue-"+numOfRows+"-"+i+"'></td>";
		
	}
	str+="</tr>";
	$('#row-count').val(numOfRows);
	$('#'+id).append(str);
	
	
	
}


function validateItemIssueForm(){
	flag=true;
	//checking top table
	$('#id-table1-itemissue-upper input').each(function(){
		
		if($(this).val()==""){
			flag=false;
			
		}else{
			flag=true;
		}
	});
	//checking for all tr s.if first value is filled next all fields
	var numRows=$('#id-table1-itemissue-lower tr').size()-1;
	//checking tr s
	var numCols=6;
	for(var i=0;i<numRows;i++){
		if($("#id-itemissue-"+i+"-0").val()!=''){
			///checking 
			console.log($("#id-itemissue-"+i+"-0").val());
			for(var j=1;j<numCols;j++){
				if($("#id-itemissue-"+i+"-"+j).val()==''){
					//console.log("#id-itemissue-"+i+"-"+j +"  -> "+  $("#id-itemissue-"+i+"-"+j).val());
					flag=false;
				}else{
					flag=true;
				}
			}
		}
	}
	
	
	if(!flag){
		alert("Please fill the data correctly!");
	}
	return flag;
	
	
}



