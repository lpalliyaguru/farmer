<?php

hImport("support.form.HFormBuilder");
hImport("support.table.HTableObject");
hImport("system.area.Area");
hImport("system.area.Bank");
hImport("system.farmer.Farmer");

require_once 'components/com_farmer/RegForm_Farmer.php';
require_once 'components/com_farmer/UpdateForm_Farmer.php';


if(getParam("postAction")){
	$action=getParam("postAction");

	$farmer = new Farmer();
	$farmer->setName($_POST['farmername']);
	$farmer->setSurname($_POST['farmerSurname']);
	$farmer->setEntityId($_POST['farmerno']);
	$farmer->setAreaId($_POST['farmerArea']);
	$farmer->setAddress($_POST['farmerAdd']);
	$farmer->setTp($_POST['farmerTelNo']);
	$farmer->setGender($_POST['farmerGen']);
	$farmer->setNic($_POST['farmerNic']);
	$farmer->setNationality($_POST['farmerNation']);
	$farmer->setAcherage($_POST['farmerAcher']);
	$farmer->setCategory($_POST['farmerProCat']);
	$farmer->setBankCode($_POST['farmerBank']);
	$farmer->setAccountNo($_POST['farmerAccNo']);
	$farmer->setAcctHolder($_POST['farmerAccHolder']);
	$farmer->setAddedBy($_SESSION['SESS_MEMBER_ID']);
	
	$farmer->saveFarmer($farmer);
	
}else{	

	if($_GET['getAction'] == "addFarmer"){
		$farmerReg = new RegForm_Farmer();
		print $farmerReg->farmerRegistrator();
		
	}else if($_GET['getAction'] == "editFarmer"){
		$farmerUpdate = new UpdateForm_Farmer();
		print  $farmerUpdate->farmerUpdater($_GET['farmerId']);
		
		
		
	}





}

?>