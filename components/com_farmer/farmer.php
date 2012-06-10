<?php

hImport("support.form.HFormBuilder");
hImport("support.table.HTableObject");
hImport("system.area.Area");
hImport("system.area.Bank");
hImport("system.farmer.Farmer");
hImport("system.category.Category");
hImport("system.season.Season");
hImport("system.farmer.FarmerBelongs");

require_once 'components/com_farmer/RegForm_Farmer.php';
require_once 'components/com_farmer/UpdateForm_Farmer.php';
require_once 'components/com_farmer/GetFarmer.php';
require_once 'components/com_farmer/FarmerRegForSeasonForm.php';


if(getParam("postAction")){
	$action=getParam("postAction");

	if($action == "save"){
		$farmer = new Farmer();
		$farmer->setName($_POST['farmername']);
		$farmer->setSurname($_POST['farmerSurname']);
		$farmer->setEntityId($_POST['farmerno']);
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
	}
	if($action == "update"){
		$farmer = new Farmer();
		$farmer->setName($_POST['farmername']);
		$farmer->setSurname($_POST['farmerSurname']);
		$farmer->setEntityId($_POST['farmerno']);
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
		
		$farmer->updateFarmer($farmer);
	}
	if($action == "saveform"){
		$farmerBl = new FarmerBelongs();		
		$farmerBl->saveFarmerToSeason($_POST['farmerRegNic'], $_POST['farmerRegSeason'], $_POST['farmerCenter']);
				
	}
	
	
}else{

	if($_GET['getAction'] == "addFarmer"){
		$farmerReg = new RegForm_Farmer();
		print $farmerReg->farmerRegistrator();

	}else if($_GET['getAction'] == "editFarmer"){
		$farmers = new GetFarmer();
		print  $farmers->getFarmers();
			
	}else if($_GET['getAction'] == "editForm"){
		$nic = $_GET['nic'];
		
		$farmerEdit = new UpdateForm_Farmer();
		print  $farmerEdit->farmerUpdater($nic);
		
	}else if($_GET['getAction'] == "deleteForm"){
		$nic = $_GET['nic'];
		
		$farmer = new Farmer();
		$farmer->deleteFarmer($nic);
		
	}else if($_GET['getAction'] == "addFarmerforSeason"){
		$farmerAdd = new FarmerRegForSeasonForm();
		print $farmerAdd->getBaseForm();		
		
	}else if($_GET['getAction'] == "editFarmerforSeason"){
		$farmerAdd = new FarmerEditSeasonForm();
		print $farmerAdd->getEditForm();		
		
	}


}

?>