<?php

class RegForm_Farmer{


	public function farmerRegistrator(){

		$baseForm = new HFormBuilder("?page=com_farmer", "post","Farmer Registration","farmerReg");
		$farmerRegForm = $baseForm->getForm();
		$farmerRegForm->setLayout(DEFAULT_LAYOUT);
		$farmerRegForm->setOnsubmit("saveFarmerDetails()");
		$farmerRegForm->setClass("h-class-farmerloginform");

		$inputName = new HTableObject(INPUT);
		$farmername = new Input("farmername","text");
		$farmername->setID("farmer-name");
		$inputName->addInput($farmername);

		$inputSurname = new HTableObject(INPUT);
		$farmerSurname = new Input("farmerSurname","text");
		$farmerSurname->setID("farmer-surname");
		$inputSurname->addInput($farmerSurname);

		$inputFarmerno = new HTableObject(INPUT);
		$farmerno = new Input("farmerno","text");
		$farmerno->setID("farmer-no");
		$inputFarmerno->addInput($farmerno);

		/*	$selectAreaname = new HTableObject(SELECT);
		 $farmerAreaname = new Select("farmerArea", "select");
		 $farmerAreaname->setID("farmer-areaname");

		 $area = new Area();
		 $areaNames = $area->getAreaNames();
		 ($areaNames) ;

		 $arr = array();
		 $arr[0]['value'] = -1;
		 $arr[0]['option'] = 'Select an area';

		 if($areaNames){
			$i = 1;
			foreach ($areaNames as $areas){

			$arr[$i]['value'] = $areas['areaId'];
			$arr[$i]['option'] = $areas['areaName'];
			$i++;
			}

			}


			$farmerAreaname->setOptions($arr);
			$selectAreaname->addSelect($farmerAreaname);

			$selectCenterName = new HTableObject(SELECT);
			$farmerCentername = new Select("farmerCenter", "select");
			$farmerCentername->setID("farmer-centername");

			$arr2[0]['value'] = -1;
			$arr2[0]['option'] = 'Select a center';
			$farmerCentername->setOptions($arr2);
			$selectCenterName->addSelect($farmerCentername);
			*/
		$inputAddress = new HTableObject(INPUT);
		$farmerAddress = new Input("farmerAdd", "text");
		$farmerAddress->setID("farmer-address");
		$inputAddress->addInput($farmerAddress);

		$inputTelNo = new HTableObject(INPUT);
		$farmerTelNo = new Input("farmerTelNo", "text");
		$farmerTelNo->setID("farmer-telNo");
		$inputTelNo->addInput($farmerTelNo);

		$radioGen = new HTableObject(RADIO);
		$farmerGen = new Radio("farmerGen", "radio");
		$farmerGen->setID("farmer-gen");

		$radio=array(array("value"=>"1","text"=>"Male"),array("value"=>"2","text"=>"Female"));
		$farmerGen->setOptions($radio);
		$radioGen->addRadio($farmerGen);

		$inputNic = new HTableObject(INPUT);
		$farmerNic = new Input("farmerNic", "text");
		$farmerNic->setID("farmer-nic");
		$inputNic->addInput($farmerNic);

		$inputNation = new HTableObject(INPUT);
		$farmerNation = new Input("farmerNation", "text");
		$farmerNation->setID("farmer-nation");
		$inputNation->addInput($farmerNation);

		$inputAcher = new HTableObject(INPUT);
		$farmerAcher = new Input("farmerAcher", "text");
		$farmerAcher->setID("farmer-acher");
		$inputAcher->addInput($farmerAcher);

		$inputProCat = new HTableObject(SELECT);
		$farmerProCat = new Select("farmerProCat", "select");
		$farmerProCat->setID("farmer-procat");
			
		$arrCat = array();
		$category = new Category();
		$categories = $category->getCategories();
		$arrCat[0]['value'] = "-1";
		$arrCat[0]['option'] = "Select a category";
			
		if($categories){
			$j = 1;
			foreach ($categories as $cat){
				$arrCat[$j]['value'] = $cat['categoryCode'];
				$arrCat[$j]['option'] = $cat['description'];
				$j++;
			}

		}
			
		$farmerProCat->setOptions($arrCat);
		$inputProCat->addSelect($farmerProCat);

		$selectBank = new HTableObject(SELECT);
		$farmerBank = new Select("farmerBank", "select");
		$farmerBank->setID("farmer-bank");

		$arr2 = array();
		$bank = new Bank();
		$bankNames = $bank->getBanks();

		$arr2[0]['value'] = -1;
		$arr2[0]['option'] = "Select a Bank";

		if($bankNames){
			$i = 1;
			foreach ($bankNames as $banks){
				$arr2[$i]['value'] = $banks['bankCode'];
				$arr2[$i]['option'] = $banks['bankName'];
				$i++;
			}

		}

		$farmerBank->setOptions($arr2);
		$selectBank->addSelect($farmerBank);

		$selectBranch = new HTableObject(SELECT);
		$farmerbranch = new Select("farmerBranch", "select");
		$farmerbranch->setID("farmer-branch");

		$arr3 = array();
		$arr3[0]['value'] = 0;
		$arr3[0]['option'] = 'Select a branch';
		$farmerbranch->setOptions($arr3);
		$selectBranch->addSelect($farmerbranch);

		$inputAccNo = new HTableObject(INPUT);
		$farmerAccNo = new Input("farmerAccNo", "text");
		$farmerAccNo->setID("farmer-acc");
		$inputAccNo->addInput($farmerAccNo);

		$inputAccHol = new HTableObject(INPUT);
		$farmerAccHol = new Input("farmerAccHolder", "text");
		$farmerAccHol->setID("farmer-acchol");
		$inputAccHol->addInput($farmerAccHol);

		$inputHidden = new HTableObject(INPUT);
		$farmerHidden = new Input("postAction", "hidden");
		$farmerHidden ->setID("postAction");
		$farmerHidden->setDefaultValue("save");
		$inputHidden ->addInput($farmerHidden);


		$submit = new HTableObject(INPUT);
		$submitBtn = new Input("", "submit","Submit");
		$submitBtn->setID("farmer-regsubmit");
		$submit->addInput($submitBtn);

		$fields = array(
		array('label'=>'Farmer Name','object'=>$inputName),
		array('label'=>'Farmer Surname','object'=>$inputSurname),
		array('label'=>'Farmer No','object'=>$inputFarmerno),
		//array('label'=>'Area Name','object'=>$selectAreaname),
		//array('label'=>'Center Name','object'=>$selectCenterName),
		array('label'=>'Farmer Address','object'=>$inputAddress),
		array('label'=>'Telephone No','object'=>$inputTelNo),
		array('label'=>'Gender','object'=>$radioGen),
		array('label'=>'NIC No','object'=>$inputNic),
		array('label'=>'Nationality','object'=>$inputNation),
		array('label'=>'Acherage','object'=>$inputAcher),
		array('label'=>'Product Category','object'=>$inputProCat),
		array('label'=>'Bank name','object'=>$selectBank ),
		array('label'=>'Bank branch','object'=>$selectBranch),
		array('label'=>'Account Number','object'=>$inputAccNo),
		array('label'=>'Account holder name','object'=>$inputAccHol),
		array('label'=>'','object'=>$inputHidden),
		array('label'=>'','object'=>$submit),
		);

		$farmerRegForm->addFields($fields);

		return $farmerRegForm->renderForm();

	}
}

?>