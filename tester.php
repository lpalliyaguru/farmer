<?php

require_once 'includes/call.php';

hImport("support.table.HTableBuilder");
hImport("support.tableObject.tableObject");
hImport("support.table.HTableObject");
hImport("support.form.HFormBuilder");
/*
$tblBulider=new HTableBuilder();
$table=$tblBulider->getTable();
$table->setLayout(10, 2);




$in=new Radio("selectme", "select","submit");
$opt=array(
			array("value"=>"value1","text"=>"option1"),
			array("value"=>"value2","text"=>"option2"),
			array("value"=>"value3","text"=>"option3")
			);

$br=new HTableObject("RADIO");
$br->addRadio($in);
$in->setOptions($opt);
$table->setCellData(1, 1,$br);
print $table->renderTable();
*/


$formBlder=new HFormBuilder("index.php", "post");
$form=$formBlder->getForm();
$form->setLayout(DEFAULT_LAYOUT);
//set the fields 

$linkTblObj=new HTableObject(LINK);
$link=new Link("index.php?page=12","page12");
$linkTblObj->addLink($link);

$imgTO=new HTableObject(IMAGE);
$image=new image("images/pic.jpg",100,80);
$imgTO->addImage($image);

$inputTO=new HTableObject(INPUT);
$input=new Input("username", "text");
$inputTO->addInput($input);


$fields=array(
				array('label'=>'image','object'=>$imgTO),
		  		array('label'=>'link','object'=>$linkTblObj),
		 		array('label'=>'input','object'=>$inputTO),
		 		array('label'=>'input','object'=>$inputTO),
		  		);
$form->addFields($fields);

$form->renderForm();


?>
<script type="text/javascript" src="libraries/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" >
$(document).ready(function(){


	$.post("ajax_index.php",{"obj_uri":"system.hello"},function(d){
				alert(d);
		});

	
});





</script>




