
$(document).ready(function(){
	/*this is date picker*/
	$('#id-itemissue-1-date').datepicker({dateFormat: 'yy-mm-dd'});
	//$('.class-itemissue-cell').keyup(function(e){

	//});
	/* upper table movements
	 */
	
	
	$('.class-itemissue-lower-cell').keyup(function(e){
		var id=$(this).attr('id');
		var key=e.keyCode;
		switch (id){
		 	case "id-itemissue-1-season":
		 		if(key==39){
		 			$('#id-itemissue-1-receipt').focus();
		 			
		 		}
		 		break;
		 	case 'id-itemissue-1-receipt':
		 		if(key==39 ){
		 			$('#id-itemissue-1-farmerid').focus();
		 		}else if(key==40){
		 			$('#id-itemissue-1-date').focus();
		 		}
		 		else if(key==37){
		 			$('#id-itemissue-1-season').focus();
		 		}
		 	break;
		 	case "id-itemissue-1-farmerid":
		 		if(key==38){
		 			$('#id-itemissue-1-season').focus();
		 		}else if(key==39){
		 			$('#id-itemissue-1-date').focus();
		 			$('#ui-datepicker-div').show();
		 		}else if(key==40){
		 			$('#id-itemissue-1-center').focus();
		 		}
		 		break;
		 	case "id-itemissue-1-date":
		 		if(key==38){
		 			$('#id-itemissue-1-receipt').focus();
		 			
		 		}else if(key==37){
		 			$('#id-itemissue-1-farmerid').focus();
		 		}else if(key==40){
		 			$('#id-itemissue-1-farmername').focus();
		 		}
		 		break;
			case "id-itemissue-1-center":
		 		if(key==38){
		 			$('#id-itemissue-1-farmerid').focus();
		 			
		 		}else if(key==40){
		 			$('#id-itemissue-0-0').focus();
		 		}else if(key==39){
		 			$('#id-itemissue-1-farmername').focus();
		 		}
		 		break;
			case "id-itemissue-1-farmername":
		 		if(key==38){
		 			$('#id-itemissue-1-date').focus();
		 			
		 		}else if(key==40){
		 			$('#id-itemissue-0-0').focus();
		 		}else if(key==37){
		 			$('#id-itemissue-1-center').focus();
		 		}
		 		break;
		 		
		}
		
		
	});
	
	
});
function goThere(e,id){
	numOfRows=($("#id-table1-itemissue-lower tr").length)-1;
	
	//var id=$(this).attr('id');
	var key=e.keyCode;
	splt=id.split('-');
	row=splt[2];
	col=splt[3];
	
	switch (key) {
		case 37:
			if(col>0){
					col--;
					$("#id-itemissue-"+row+"-"+col).focus();
					
				}else{
					row--;
					col=numOfRows;
					
					$("#id-itemissue-"+row+"-"+col).focus();
				}
			if(row==0 && col==0){
				
				$("#id-itemissue-1-farmername").focus();
			
			}
			break;
		case 39:
			if(col<numOfRows){	
				col++;
				$("#id-itemissue-"+row+"-"+col).focus();
				
			}else{
				row++;col=0;
				$("#id-itemissue-"+row+"-"+col).focus();
			}
				
			
			break;
		case 38:
			if(row>0){	row--;
				$("#id-itemissue-"+row+"-"+col).focus();
				
			}else{
				row=numOfRows;col--;
				$("#id-itemissue-"+row+"-"+col).focus();
			}
			break;	
		case 40:
			if(row<numOfRows){
				row++;
				$("#id-itemissue-"+row+"-"+col).focus();
				
			}else if(row==(numOfRows-1)){
				
				
				row=0;col++;
				$("#id-itemissue-"+row+"-"+col).focus();
			}
			break;	
			
		default:
			break;
	}
	
	}	

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
		if(i==0){str+="<td align='center'><input type='text' id='id-itemissue-"+(numOfRows-1)+"-"+i+"' class='class-itemissue-cell itemCode' onkeyup='goThere(event,this.id)' name='name-itemissue-"+(numOfRows-1)+"-"+i+"'></td>";}
		else if(i==3){
			str+="<td align='center'><input type='text' id='id-itemissue-"+(numOfRows-1)+"-"+i+"' onblur='calculateValue(this.id,this.value)' class='class-itemissue-cell itemCode' onkeyup='goThere(event,this.id)' name='name-itemissue-"+(numOfRows-1)+"-"+i+"'></td>";
		}
		else{
			str+="<td align='center'><input type='text' id='id-itemissue-"+(numOfRows-1)+"-"+i+"' class='class-itemissue-cell' onkeyup='goThere(event,this.id)' name='name-itemissue-"+(numOfRows-1)+"-"+i+"'></td>";
		}
		
		
	} 
	str+="</tr>";
	if(numOfRows<9){
		$('#row-count').val(numOfRows);
		$('#'+id).append(str);
		//for(i=0;i<6;i++){
			//$("#id-itemissue-"+(numOfRows-1)+"-"+i).bind('keyup',function(e){});
			$("#id-itemissue-"+(numOfRows-1)+"-0").autocomplete({
				source:getAllItemCodes(),
				select:function(event,ui){
					//$(this).val(ui.item.label);
					id=$(this).attr('id');
     				
     				splt=id.split('-');
     				row=splt[2];
     				col=splt[3];
     				if(!checkItemExist(ui.item.label)){
         				$(this).val(ui.item.label);
         				$("#id-itemissue-"+row+"-4").val(ui.item.value); 				
         				return false;
     				}else {
						alert("Cannot enter same item more than once.");
						$(this).val("");
						return false;
         				}
     				
					
				}
			});
			
		//} 
	}else{
		alert("Maximum number of rows have been added.");
	}
	
	
	
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
			
			for(var j=3;j<numCols;j++){
				
				if($("#id-itemissue-"+i+"-"+j).val()==''){
					
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

/*
 * calculating the values of rows
 */

function calculateValue(id,q){
	splt=id.split('-');
	row=splt[2];
	col=splt[3];
	numOfRows=($("#id-table1-itemissue-lower tr").length)-1;
		if(Number(q) || q==""){
			if($('#id-itemissue-'+row+'-0').val()!=""){
				rate=parseFloat($('#id-itemissue-'+row+'-4').val());
				val=Math.round(parseInt(q)*rate*100)/100;
				$('#id-itemissue-'+row+'-5').val(val);
				total=0;
				for(i=0;i<numOfRows;i++){
					if($('#id-itemissue-'+i+'-5').val()!="")
					total+=parseFloat($('#id-itemissue-'+i+'-5').val());
				}
				$('#id-itemissue-total').val(Math.round(total*100)/100);
			}else{
				if(q!=""){
					alert("Please enter item code first");
					$('#'+id).val("");
					$('#id-itemissue-'+row+'-0').focus();
				}
				
			}
			
			
		}else{
			alert("Please enter a correct Quantity");
			$('#'+id).val("").focus();
		}
	
		
}

function searchItemIssue(){
	//obtaining search keys
	
	var farmerId=$('#id-hidden-issueview-nic').val();
	var center=$('#id-hidden-issueview-center').val();
	var season=$('#id-issueview-season').val();
	var date=$('#id-issueview-date').val();
	var receipt=$('#id-issueview-receipt').val();
	var result;
	
	$.ajax({
		url:"ajax_index.php",
		type:'post',
		dataType:"json",
		data:{'object':"system.item.FarmerItem->j_getAllIssues",'params':[farmerId,center,season,date]},
		async:false,
		success:function(d){
			//result=jQuery.parseJSON(d); 
		 	if(d.status=='true'){
		 		
		 		if(d.body!=false){
		 			result=d.body;
		 			console.log(result)
		 			renderView(result,farmerId,center,season,date,receipt);
		 		}else{
		 			result=false;
		 			alert("No Items have been issued ");
		 		}
		 		
		 	}else{
		 		console.log(d.message);
		 	}
			}
	
	});
	
	
	
}

function getAllItemCodes(){
	var result;
	$.ajax({
		url:"ajax_index.php",
		type:'post',
		dataType:"json",
		data:{'object':"system.item.Item->j_getAllItems",'params':null},
		async:false,
		success:function(d){
			//result=jQuery.parseJSON(d); 
			
		 	if(d.status=='true'){
		 		result=d.body;
		 	}else{
		 		
		 	}
			}
	
	});
	
	return result;
	
}




function renderView(result,f,c,s,d,r){
	
	rows=result.length;
	str="<table border='1' >";
	for(i=0;i<rows;i++){
		
		str+="<tr>";
	str+="<td> Receipt No : "+result[i][0]['receipt']+" </td>";
	str+="<td><a href='index.php?page=com_item&getAction=edititemissue&f="+f+"&c="+c+"&s="+s+"&d="+d+"&r="+result[i][0]['receipt']+"'>Edit</a></td>";
	str+="<td><a href='index.php?page=com_item&getAction=delitemissue&f="+f+"&c="+c+"&s="+s+"&d="+d+"&r="+result[i][0]['receipt']+"'>Delete</a></td>";
	str+="<tr>";
	}
	
	str+="</table >";
	$('#id-issueview-window').html(str);
	
}





