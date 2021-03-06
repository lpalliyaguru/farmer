<?php

class UpdateForm_Farmer{

	public function farmerUpdater($nic){

		$farmer = new Farmer();
		$farmerData = $farmer->getFarmerByNIC($nic);


		$baseForm = new HFormBuilder("?page=com_farmer", "post","Farmer Update Form","farmerUpdate");
		$farmerRegForm = $baseForm->getForm();
		$farmerRegForm->setLayout(DEFAULT_LAYOUT);
		$farmerRegForm->setOnsubmit("saveFarmerDetails()");
		$farmerRegForm->setClass("h-class-farmerloginform");

		if($farmerData){
			$inputName = new HTableObject(INPUT);
			$farmername = new Input("farmername","text",$farmerData->getName());
			$farmername->setID("farmer-name");
			$farmername->setDefaultValue($farmerData->getName());
			$inputName->addInput($farmername);

			$inputSurname = new HTableObject(INPUT);
			$farmerSurname = new Input("farmerSurname","text");
			$farmerSurname->setID("farmer-surname");
			$farmerSurname->setDefaultValue($farmerData->getSurname());
			$inputSurname->addInput($farmerSurname);

			$inputFarmerno = new HTableObject(INPUT);
			$farmerno = new Input("farmerno","text");
			$farmerno->setID("farmer-no");
			$farmerno->setDefaultValue($farmerData->getEntityId());
			$inputFarmerno->addInput($farmerno);
				
			$inputAddress = new HTableObject(INPUT);
			$farmerAddress = new Input("farmerAdd", "text");
			$farmerAddress->setID("farmer-address");
			$farmerAddress->setDefaultValue($farmerData->getAddress());
			$inputAddress->addInput($farmerAddress);

			$inputTelNo = new HTableObject(INPUT);
			$farmerTelNo = new Input("farmerTelNo", "text");
			$farmerTelNo->setID("farmer-telNo");
			$farmerTelNo->setDefaultValue($farmerData->getTp());
			$inputTelNo->addInput($farmerTelNo);

			$radioGen = new HTableObject(RADIO);
			$farmerGen = new Radio("farmerGen", "radio");
			$farmerGen->setID("farmer-gen");
			$farmerGen->setDefaultValue($farmerData->getGender());
			$radio=array(array("value"=>"1","text"=>"Male"),array("value"=>"2","text"=>"Female"));
			$farmerGen->setOptions($radio);
			$radioGen->addRadio($farmerGen);

			$inputNic = new HTableObject(INPUT);
			$farmerNic = new Input("farmerNic", "text");
			$farmerNic->setID("farmer-nic");
			$farmerNic->setDefaultValue($farmerData->getNic());
			$inputNic->addInput($farmerNic);

			$inputNation = new HTableObject(INPUT);
			$farmerNation = new Input("farmerNation", "text");
			$farmerNation->setID("farmer-nation");
			$farmerNation->setDefaultValue($farmerData->getNationality());
			$inputNation->addInput($farmerNation);

			$inputAcher = new HTableObject(INPUT);
			$farmerAcher = new Input("farmerAcher", "text");
			$farmerAcher->setID("farmer-acher");
			$farmerAcher->setDefaultValue($farmerData->getAcherage());
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

			$arr[0]['value'] = 0;
			$arr[0]['option'] = 'Select a branch';
			$farmerbranch->setOptions($arr);
			$selectBranch->addSelect($farmerbranch);

			$inputAccNo = new HTableObject(INPUT);
			$farmerAccNo = new Input("farmerAccNo", "text");
			$farmerAccNo->setID("farmer-acc");
			$farmerAccNo->setDefaultValue($farmerData->getAccountNo());
			$inputAccNo->addInput($farmerAccNo);

			$inputAccHol = new HTableObject(INPUT);
			$farmerAccHol = new Input("farmerAccHolder", "text");
			$farmerAccHol->setID("farmer-acchol");
			$farmerAccHol->setDefaultValue($farmerData->getAcctHolder());
			$inputAccHol->addInput($farmerAccHol);

			$inputHidden = new HTableObject(INPUT);
			$farmerHidden = new Input("postAction", "hidden");
			$farmerHidden ->setID("postAction");
			$farmerHidden->setDefaultValue("update");
			$inputHidden ->addInput($farmerHidden);

		}
		$submit = new HTableObject(INPUT);
		$submitBtn = new Input("", "submit","Submit");
		$submitBtn->setID("farmer-regsubmit");
		$submit->addInput($submitBtn);

		$fields = array(
		array('label'=>'Farmer Name','object'=>$inputName),
		array('label'=>'Farmer Surname','object'=>$inputSurname),
		array('label'=>'Farmer No','object'=>$inputFarmerno),
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
