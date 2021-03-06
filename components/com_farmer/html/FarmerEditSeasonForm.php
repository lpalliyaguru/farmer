<?php

class FarmerEditSeasonForm{
	
	public function getEditForm($id){
		
		$farmerBelong = new FarmerBelongs();
		$farmerBl = $farmerBelong->getFarmerBelongById($id);
		
		$baseForm = new HFormBuilder("?page=com_farmer", "post","Farmer Registration for Season(Edit)","farmerEditSeason");
		$farmerRegSeasonForm = $baseForm->getForm();
		$farmerRegSeasonForm->setLayout(DEFAULT_LAYOUT);
		$farmerRegSeasonForm->setOnsubmit("saveFarmerforSeasonDetails()");
		$farmerRegSeasonForm->setClass("h-class-farmerregform");

		$inputNic = new HTableObject(INPUT);
		$farmerNic = new Input("farmerRegNic", "text");
		$farmerNic->setID("farmer-nic");
		$farmerNic->setDefaultValue($farmerBl->getNic());
		$inputNic->addInput($farmerNic);

		$selectSeason = new HTableObject(SELECT);
		$farmerSeason = new Select("farmerRegSeason", "select");
		$farmerSeason->setID("farmer-season");

		$arr = array();
		$season = new Season();
		$seasons = $season->getSeasons();

		$arr[0]['value'] = -1;
		$arr[0]['option'] = "Select a Season";

		if($seasons){
			$i = 1;
			foreach ($seasons as $s){
				$arr[$i]['value'] = $s['id'];
				$arr[$i]['option'] = $s['name'];

				$i++;
			}
		}
		$farmerSeason->setOptions($arr);
		$selectSeason->addSelect($farmerSeason);

		$selectAreaname = new HTableObject(SELECT);
		$farmerAreaname = new Select("farmerArea", "select");
		$farmerAreaname->setID("farmer-areaname");

		$area = new Area();
		$areaNames = $area->getAreaNames();
		($areaNames) ;

		$arr = array();
		$arr[0]['value'] = -1;
		$arr[0]['option'] = 'Select an Area';

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
		
		$arr2 = array();
		$arr2[0]['value'] = -1;
		$arr2[0]['option'] = 'Select a Center';
		
		$farmerCentername->setOptions($arr2);
		$selectCenterName->addSelect($farmerCentername);

		$inputHidden = new HTableObject(INPUT);
		$farmerHidden = new Input("postAction", "hidden");
		$farmerHidden ->setID("postAction");
		$farmerHidden->setDefaultValue("editform");
		$inputHidden ->addInput($farmerHidden);

		$inputHidden2 = new HTableObject(INPUT);
		$idHidden = new Input("belongId", "hidden");
		$idHidden->setDefaultValue($id);
		$inputHidden2->addInput($idHidden);		
		
		$submit = new HTableObject(INPUT);
		$submitBtn = new Input("","submit","Submit");
		$submitBtn->setID("farmer-regsubmit");
		$submit->addInput($submitBtn);

		$fields = array(
		array('label'=>'Farmer NIC','object'=>$inputNic),
		array('label'=>'Season Name','object'=>$selectSeason),
		array('label'=>'Area','object'=>$selectAreaname),
		array('label'=>'Center','object'=>$selectCenterName),
		array('label'=>$inputHidden2,'object'=>$inputHidden),
		array('label'=>'','object'=>$submit)
		);

		$farmerRegSeasonForm->addFields($fields);
		
		return $farmerRegSeasonForm->renderForm();		
		
	}
	
	
	
}


?>