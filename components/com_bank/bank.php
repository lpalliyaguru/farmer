<?php

hImport("system.area.Bank");
hImport("system.area.BankBranch");
import("HTML_renderer");
/*
 * checking the GET calls 
 */
if(getParam("getAction")){
	$getAction=getParam("getAction");
	switch ($getAction){
		case 'add':
			HTML_renderer::addBank();
			break;
		case 'view':
			HTML_renderer::viewBanks();
			break;
		case 'edit':
			HTML_renderer::editBank();
			break;
		case 'del':
			HTML_renderer::deleteBank();
			break;
		case 'addBranch':
			HTML_renderer::addBankBranch();
			break;
		case 'viewBranch':
			HTML_renderer::viewBankBranch();
			break;
		case 'delBranch':
			HTML_renderer::deleteBankBranch();
			break;
		case 'editBranch':
			HTML_renderer::editBankBranch();
			break;
		default:
			break;
	}
	
}else{
	//715855813
	
}
/*
 * checking POST actions 
 */

if(getParam("postAction")){
	$postAction=getParam("postAction");
	switch ($postAction){
		case 'save':
			saveBank($_POST);
			break;
		case 'update':
			updateBank($_POST);
			break;
		case 'saveBranch':
			saveBankBranch($_POST);
			break;
		case 'updateBranch':
			updateBankBranch($_POST);
			break;			
		default:
			break;
	}
	
}




function saveBank($post){
	
	$bank=new Bank();
	$bank->setCode($post['name-bank-id']);
	$bank->setName($post['name-bank-name']);

	
	if($bank->saveBank($bank)){
		//$mainframe->redirect("index.php?page=com_hello","area saved","SUCCESS");
		print "<p class='class-alert'><span></span>Bank saved successfully!</p>";
	}else{
		print "<p class='class-error'><span></span>There was an error saving bank data.Please try again.</p>";
	}
}

function updateBank($post){
	$id=$post['update-bank-form'];
	$bank=new Bank();
	$bank->setCode($id);
	$bank->setName($post['name-bank-name']);
	if($bank->deleteBank($id)){
		if($bank->saveBank($bank)){
			print "<p class='class-alert'><span></span>Bank updated successfully!</p>";
			
		}else{
			print "<p class='class-error'><span></span>There was an error updating bank data.Please try again.</p>";
		}
	}
	
	
}

function saveBankBranch($post){
	
	$branch=new BankBranch();
	$branch->setBranchCode($post['name-bankbranch-id']);
	$branch->setBranchName($post['name-bankbranch-name']);
	$branch->setBankCode($post['name-bankbranch-bank']);
	
	
	if($branch->saveBranch($branch)){
		
		print "<p class='class-alert'><span></span>Bank Branch saved successfully!</p>";
	}else{
		print "<p class='class-error'><span></span>There was an error saving bank branch data.Please try again.</p>";
	}
}

function updateBankBranch($post){
		$id=$post['update-bankbranch'];
		$branch=new BankBranch();
		$branch->setBranchCode($id);
		$branch->setBranchName($post['name-bankbranch-name']);
		$branch->setBankCode($post['name-bankbranch-bank']);
		if($branch->deleteBranch($id)){
			if($branch->saveBranch($branch)){
				print "<p class='class-alert'><span></span>Branch updated successfully!</p>";
			}else{
				print "<p class='class-error'><span></span>There was an error updating  branch data.Please try again.</p>";
			}
			
		}
		
		
		
	}
 

?>