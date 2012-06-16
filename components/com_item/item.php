<?php
import("Item_renderer");

hImport("system.item.Item");
hImport("system.area.Area");
hImport("system.farmer.Farmer");
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


?>