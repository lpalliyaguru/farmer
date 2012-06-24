<?php
import("Item_renderer");

hImport("system.item.Item");
hImport("system.area.Area");
hImport("system.farmer.Farmer");
hImport("system.farmer.FarmerBelongs");
hImport("system.season.Season");
hImport("system.item.FarmerItem")
;

/*
 * get the getAction value
 */
if($action=getParam('getAction')){

	switch ($action){
		case "view":
			Item_renderer::viewItems();
			break;
		case  "add":
			Item_renderer::addItems();
			break;
		case  "edit":
			Item_renderer::editItems();
			break;
		case  "del":
			deleteItem();
			break;
		case  "issueitem":
			Item_renderer::issueItem();
			break;
		case  "viewitemissues":
			Item_renderer::viewIssueItem();
			break;
		case "edititemissue":
			Item_renderer::editItemIssue();
			break;
		case "delitemissue":
			deleteItemIssue();
			break;
	}

}

/*
 * get the postAction value
 */

if($postAction=getParam("postAction")){
	switch ($postAction){
		case 'saveitem':
			saveItem($_POST);
			break;
		case 'updateitem':
			updateItem($_POST);
			break;
		case 'saveitemissue':
			saveItemIssue($_POST);
			break;
		case 'updateitemissue':
			updateItemIssue($_POST);
	}


}

/*
 * without HTMl rendering function , saving like function is implemented here.
 */

function saveItem($post){

	$item=new Item();
	$item->setItemCode($post['name-item-itemcode']);
	$item->setItemName($post['name-item-name']);
	$item->setCostPrice($post['name-item-costprice']);
	$item->setSellingPrice($post['name-item-sellprice']);
	$item->setUnit($post['name-item-unit']);
	$item->setRemarks($post['name-item-remarks']);

	if($item->saveItem($item)){
		print "<p class='class-alert'><span></span>Item saved successfully!</p>";
	}else{
		print "<p class='class-error'><span></span>There was an error saving item data.Please try again.</p>";
	}
}

function updateItem($post){

	$item=new Item();
	$item->setItemCode($post['update-item']);
	$item->setItemName($post['name-item-name']);
	$item->setCostPrice($post['name-item-costprice']);
	$item->setSellingPrice($post['name-item-sellprice']);
	$item->setUnit($post['name-item-unit']);
	$item->setRemarks($post['name-item-remarks']);

	if($item->deleteItem($post['update-item'])){
		if($item->saveItem($item)){
			print "<p class='class-alert'><span></span>Item updated successfully!</p>";
		}else{
			print "<p class='class-error'><span></span>There was an error updating item data.Please try again.</p>";
		}

	}

}

function deleteItem(){

	$id=getParam("id");
	$i=new Item();
	if($i->deleteItem($id)){
		print "<p class='class-alert'><span></span>Item deleted successfully!</p>";

	}else{
		print "<p class='class-error'><span></span>There was an error deleting item data.Please try again.</p>";
	}

}

function saveItemIssue($post){


	$season=$post['name-itemissue-1-season'];
	$date=$post['name-itemissue-1-date'];
	$farmerId=$post['name-hidden-itemissue-1-farmerid'];
	$receipt=$post['name-itemissue-1-receipt'];
	$center=$post['name-hidden-itemissue-1-center'];
		
	//$farmerItem=new FarmerItem();
	$fmBel=new FarmerBelongs();
	$fmBelId=$fmBel->getFarmerBelong($farmerId, $season, $center)->getId();
	$numRecs=$post['row-count'];
	$baseFarmerItem=new FarmerItem();
	$baseFarmerItem->setFarmerBelId($fmBelId);
	$baseFarmerItem->setDate($date);
	$baseFarmerItem->setReceipt($receipt);

	$flag=false;
	for($i=0;$i<$numRecs;$i++){

		if($post["name-itemissue-$i-0"]!=""  ){
				
			$item=$post["name-itemissue-$i-0"];
			$desc=$post["name-itemissue-$i-1"];
			$quantity=$post["name-itemissue-$i-3"];
			$amount=$post["name-itemissue-$i-5"];
				
			$farmerItem=new FarmerItem();
			$farmerItem->setFarmerBelId($fmBelId);
			$farmerItem->setDate($date);
			$farmerItem->setItemCode($item);
			$farmerItem->setAmount($amount);
			$farmerItem->setDesc($desc);
			$farmerItem->setReceipt($receipt);
			$farmerItem->setQuantity($quantity);
			if($farmerItem->saveFarmerItem($farmerItem)){
				$flag=true;
			}else{
				$flag=false;
			}
				
		}

	}
	/*
	 * checking whether item save completely
	 */	
	if($flag){
		//completed
		print "<p class='class-alert'><span></span>Item Issue saved successfully!</p>";
	}else{
		/*
		 * not completed .Clean data and put error message
		 */
		$baseFarmerItem->deleteFarmerItem($baseFarmerItem);
		print "<p class='class-error'><span></span>There was an error saving item issue data.Please try again.</p>";
	}
	
	
	
}

function updateItemIssue($post){
	//init the farmerItem object
	
	$frmerItm=new FarmerItem();
	$belong=$post['id-update-form'];
	$date=$post['name-itemissue-1-date'];
	$count=$post['row-count'];
	$receipt=$post['name-itemissue-1-receipt'];
	
	/*
	 * getting the old object
	 */
	
	$old_issue=unserialize($post['id-old-issue']);
	$old_belong=$old_issue['belong'];
	$old_date=$old_issue['date'];
	$old_receipt=$old_issue['receipt'];
	
	$old_issues=$frmerItm->getItemIssueByFamerDate($old_belong, $old_date,$old_receipt);
	
	
	
/*
 * deleting all previous data 
 */	
	
	$frmerItm->setFarmerBelId($belong);
	$frmerItm->setDate($old_date);
	$frmerItm->setReceipt($old_receipt);
	
	$frmerItm->deleteFarmerItem($frmerItm);
	$flag=true;
	for($i=0;$i<$count;$i++){

		if($post["name-itemissue-$i-0"]!=""  ){
				
			$item=$post["name-itemissue-$i-0"];
			$desc=$post["name-itemissue-$i-1"];
			$unit=$post["name-itemissue-$i-2"];
			$quantity=$post["name-itemissue-$i-3"];
			$amount=$post["name-itemissue-$i-5"];
			
				
			$farmerItem=new FarmerItem();
			$farmerItem->setFarmerBelId($belong);
			$farmerItem->setDate($date);
			$farmerItem->setItemCode($item);
			$farmerItem->setAmount($amount);
			$farmerItem->setQuantity($quantity);
			$farmerItem->setDesc($desc);
			$farmerItem->setReceipt($receipt);
			if($farmerItem->saveFarmerItem($farmerItem)){
				$flag=true;
			}else{
				$flag=false;
			}
			unset($farmerItem);
				
		}


	}
	/*
	 * checking whether update has gone ok
	 */
	if($flag){
		print "<p class='class-alert'><span></span>Item Issue saved successfully!</p>";
	}else{
		//something went wrong.new insertion should be removed and old one should be restored
		//setting old object
		$new=new FarmerItem();
		$new->setFarmerBelId($belong);
		$new->setDate($date);
		$new->setReceipt($receipt);
		//deleting the newly added data
		$new->deleteFarmerItem($new);
		$flag=true;
		foreach ($old_issues as $temp){
			if($new->saveFarmerItem($temp)){
				//saving ok
				$flag=true;
			}else{
				//saving error
				$flag=false;
			}
			
		}
		//print error
		if($flag){
			print "<p class='class-error'><span></span>There was an error updating item issue data.Please try again !</p>";
		}else{
			print "<p class='class-error'><span></span>Data colliding happens.You have to go back and delete all the item issue.Please try again !</p>";
		}
		
	}

}
function deleteItemIssue(){
	
	$farmernic=getParam("f");
	$season=getParam('s');
	$date=getParam("d");
	$center=getParam("c");
	$receipt=getParam("r");
	$fb=new FarmerBelongs();
	if($belong=$fb->getFarmerBelong($farmernic, $season, $center)->getId()){
		
		$fi=new FarmerItem();
		$fi->setFarmerBelId($belong);
		$fi->setDate($date);
		$fi->setReceipt($receipt);
	
		if($fi->deleteFarmerItem($fi)){
			print "<p class='class-alert'><span></span>Item issue deleted successfully !</p>";
		}else{
			print "<p class='class-error'><span></span>There was an error deleting item issue data.Please try again !</p>";
		}
		
	}else {
		
	
	}
	
	
	
	
	
	
}
?>