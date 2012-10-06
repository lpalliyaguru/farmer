<?php
class HTML_renderer{
	
function addBank(){
	

	?>
	<h3 class='well'>Add Bank details </h3>
	<form action="?page=com_bank" method="post" onsubmit="return validateBankform()" id="form-bank">
	<table class='table'>
		<tr>
			<td>Bank Code</td>
			<td><input type="text" id="id-bank-id" name="name-bank-id"></td>
		</tr>
		<tr>
			<td>Bank Name</td>
			<td><input type="text" id="id-bank-name" name="name-bank-name"></td>
		</tr>
	
		
		<tr>
			<td colspan="2">
				<input class='button primary'type="submit" value="Save Bank">
				<input class='button ' type="reset" value="Reset" >
				<input type="hidden" name="postAction" value="save" >
			</td>
		</tr>
	</table>
	</form>
	
	<?php 
}
	
	function viewBanks(){
		
		$b=new Bank();
		if($b->getAll()){
			$banks=$b->getAll();
			
			print "<h3 class='well' >Banks registered in the system </h3>";
			print "<table class='table'>";
			print "<tr><th>ID</th><th>Bank Code</th><th>Bank Name</th><th></th><th></th></tr>";
			$counter=1;
			foreach ($banks as  $temp){
				print "<tr>";
				print "<td>".$counter."</td>";
				print "<td>".$temp->getCode()."</td>";
				print "<td>".$temp->getName()."</td>";
				print "<td><a class='button' href='index.php?page=com_bank&getAction=edit&id=".$temp->getCode()."' ><i class='icon-pencil'></i>Edit</a></td>";
				print "<td><a class='button' href='index.php?page=com_bank&getAction=del&id=".$temp->getCode()."' onclick='return confirmBankDelete()'><i class='icon-trash'></i>Delete</a></td>";
				print "</tr>";
				$counter++;
			}
			print "</table>";
			
		}else {
			
			print "<p class='class-alert'><span></span>No banks registered in the system</p>";
			
		}
		
		
	}
function viewBankBranch(){
 	
 	$b=new BankBranch();
 	$bank=new Bank();
	if($b->getAll()){
		$branchs=$b->getAll();
		
		print "<h3 class='well'>Banks  branches registered in the system </h3>";
		print "<table  class='table'>";
		print "<tr><th>ID</th><th>Branch Code</th><th>Branch Name</th><th>Related Bank </th><th colspan='2'> </th></tr>";
		$counter=1;
		foreach ($branchs as  $temp){
			print "<tr>";
			print "<td>".$counter."</td>";
			print "<td>".$temp->getBranchCode()."</td>";
			print "<td>".$temp->getBranchName()."</td>";
			if($bnk=$bank->getBankByCode($temp->getBankCode())){
				print "<td>".$bnk->getName()."</td>";
			}else{
				print "<td></td>";
			}
			print "<td><a  class='button' href='index.php?page=com_bank&getAction=editBranch&id=".$temp->getBranchCode()."' ><i class='icon-pencil'></i>Edit</a></td>";
			print "<td><a  class='button' href='index.php?page=com_bank&getAction=delBranch&id=".$temp->getBranchCode()."' onclick='return confirmDelete()'><i class='icon-trash'></i>Delete</a></td>";
			
			//print "<td><a hr'".$bnk->getName()."</td>";
			print "</tr>";
			$counter++;
		}
		print "</table>";
		
	}else{
		
		print "<p class='class-alert'><span></span>No bank branches registered in the system</p>";
	}
 }
	
	function addBankBranch(){
		
		$bank=new Bank();
		$banks=$bank->getAll();
			?>
		<h3 class='well'>Add Bank branch details </h3>
		<form action="?page=com_bank" method="post" onsubmit="return validateBankBranchform()" id="form-bankbranch">
		<table class='table'>
			<tr>
				<td>Branch Code</td>
				<td><input type="text" id="id-bankbranch-id" name="name-bankbranch-id"></td>
			</tr>
			<tr>
				<td>Branch Name</td>
				<td><input type="text" id="id-bankbranch-name" name="name-bankbranch-name"></td>
			</tr>
			<tr>
				<td>Bank</td>
				<td><select name= "name-bankbranch-bank" id= "id-bankbranch-bank">
					<option selected="selected" value="-1">Select a Bank</option>
					<?php 
					foreach ($banks as $temp){
						
						print "<option value='".$temp->getCode()."'>";
						print $temp->getName();
						print "</option>";
					}
					?>
				
				</select>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input class='button primary' type="submit" value="Save Bank Branch">
					<input class='button' type="reset" value="Reset" >
					<input type="hidden" name="postAction" value="saveBranch" >
				</td>
			</tr>
		</table>
		</form>
		
		<?php 
	}
	function editBank(){
		$id=getParam("id");
		$b=new Bank();
		$bank=$b->getBankByCode($id);
		
		?>
	<h3 class='well'>Add Bank details </h3>
	<form action="?page=com_bank" method="post" onsubmit="return validateBankform()" id="form-bank">
	<table class='table'>
		<tr>
			<td>Bank Code</td>
			<td><input type="text" id="id-bank-id" name="name-bank-id" disabled="disabled" value="<?php print $bank->getCode()?>"></td>
		</tr>
		<tr>
			<td>Bank Name</td>
			<td><input type="text" id="id-bank-name" name="name-bank-name"  value="<?php print $bank->getName()?>"></td>
		</tr>
	
		
		<tr>
			<td colspan="2">
				<input class='button primary' type="submit" value="Save Bank">
				<input class='button' type="reset" value="Reset" >
				<input type="hidden" name="update-bank-form" value="<?php print $bank->getCode()?>" >
				<input type="hidden" name="postAction" value="update" >
			</td>
		</tr>
	</table>
	</form>
	
	<?php 
		
	}
	function deleteBank(){
		$id=getParam("id");
		$bank=new Bank();
		$b=new BankBranch();
		$branches=$b->getBrancehsByBank($id);
		
		if($bank->deleteBank($id)){
			if($branches){
				foreach ($branches as $temp){
					
					if($b->deleteBranch($temp->getBranchCode())){
						
					}
				
				}
			
			
				
			}
			print "<p class='class-alert'><span></span>Bank deleted successfully!</p>";
			
		}else{
			print "<p class='class-error'><span></span>There was an error deleting bank data.Please try again.</p>";
		}
		
		
	}
	
	function deleteBankBranch(){
		$id=getParam("id");
		$b=new BankBranch();
		
		if($b->deleteBranch($id)){
			print "<p class='class-alert'><span></span>Branch deleted successfully!</p>";
			
		}
		else{
			print "<p class='class-error'><span></span>There was an error deleting bank data.Please try again.</p>";
		}
	}
	function editBankBranch(){
		$id=getParam("id");
		
		$b=new BankBranch();
		$branch=$b->getBankBranchById($id);
		$bank=new Bank();
		$banks=$bank->getAll();
			?>
		<h3 class='well'>Edit Bank branch details </h3>
		<form action="?page=com_bank" method="post" onsubmit="return validateBankBranchform()" id="form-bankbranch">
		<table class='table'>
			<tr>
				<td>Branch Code</td>
				<td><input type="text" id="id-bankbranch-id" name="name-bankbranch-id" disabled="disabled" value="<?php print $branch->getBranchCode()?>"></td>
			</tr>
			<tr>
				<td>Branch Name</td>
				<td><input type="text" id="id-bankbranch-name" name="name-bankbranch-name" value="<?php print $branch->getBranchName()?>"></td>
			</tr>
			<tr>
				<td>Bank</td>
				<td><select name= "name-bankbranch-bank" id= "id-bankbranch-bank">
					<option selected="selected" value="-1">Select a Bank</option>
					<?php 
					foreach ($banks as $temp){
						if($temp->getCode()==$branch->getBankCode()){
							print "<option value='".$temp->getCode()."' selected='selected'>";
							print $temp->getName();
							print "</option>";
						}else{
							print "<option value='".$temp->getCode()."'>";
							print $temp->getName();
							print "</option>";
						}
					}
					?>
				
				</select>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input class='button primary' type="submit" value="Update Bank Branch">
					<input class='button ' type="reset" value="Reset" >
					<input type="hidden" name="update-bankbranch" value="<?php print $branch->getBranchCode()?>" >
					<input type="hidden" name="postAction" value="updateBranch" >
				</td>
			</tr>
		</table>
		</form>
		
		<?php 
		
	}
	
	
}

?>