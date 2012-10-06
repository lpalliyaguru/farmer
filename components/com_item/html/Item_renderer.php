
<?php

class Item_renderer{

	function viewItems(){

		$item=new Item();
		$items=$item->getAll();
		print "<h3 class='well'>View All Items</h3>";
		if($items){
			print "<table class='table'>";
			print "<tr><th>Item Code </th><th>Item Name</th><th>Cost Price </th><th >Selling Price</th><th >Unit</th><th >Remarks</th><th colspan='2' ></th></tr>";
			$counter=1;
			foreach ($items as $i){
				print "<tr>";
				//print "<td>".$counter."</td>";
				print "<td>".$i->getItemCode()."</td><td>".$i->getItemName()."</td>
						<td>".$i->getCostPrice()."</td><td>".$i->getSellingPrice()."</td><td>".$i->getUnit()."</td><td>".$i->getRemarks()."</td>";						
				print "<td><a class='button' href='?page=com_item&getAction=edit&id=".$i->getItemCode()."'><i class='icon-pencil'></i>Edit<a></td>";
				print "<td><a class='button' href='?page=com_item&getAction=del&id=".$i->getItemCode()."' onclick='return confirmDelete()'><i class='icon-trash'></i>Delete<a></td>";

				print "</tr>";
				$counter++;
			}
			print "</table>";

		}else{
			print "<p class='class-alert'><span></span>No items in the system!</p>";
		}


	}
	function addItems(){
		?>
<h3 class='well'>Add Items details</h3>
<form action="?page=com_item" method="post"
	onsubmit="return validateitemform()" id="form-item">
	<table class='table'>
		<tr>
			<td>Item Code</td>
			<td><input type="text" id="id-item-itemcode"
				name="name-item-itemcode" class="class-item"></td>
		</tr>
		<tr>
			<td>Item Name</td>
			<td><input type="text" id="id-item-name" name="name-item-name"
				class="class-item"></td>
		</tr>
		<tr>
			<td>Cost Price</td>
			<td><input type="text" id="id-item-costprice"
				name="name-item-costprice" class="class-item"></td>
		</tr>
		<tr>
			<td>Selling Price</td>
			<td><input type="text" id="id-item-sellprice"
				name="name-item-sellprice" class="class-item"></td>
		</tr>
		<tr>
			<td>Unit</td>
			<td><input type="text" id="id-item-unit" name="name-item-unit"
				class="class-item"></td>
		</tr>
		<tr>
			<td>Remarks</td>
			<td><textarea id="id-item-remarks" name="name-item-remarks"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<input class='button primary' type="submit" value="Save Item"> 
			<input class='button' type="reset" value="Reset"> 
			<input type="hidden" name="postAction"	value="saveitem">
			</td>
		</tr>
	</table>
</form>

		<?php



	}
	function editItems(){

		$id=getParam('id');
		$i=new Item();
		$item=$i->getItemByCode($id);

		?>
<h3 class='well'><i><?php print $item->getItemName();?></i> : Edit details </h3>
<form action="?page=com_item" method="post"
	onsubmit="return validateitemform()" id="form-updateitem">
	<table class="table">
		<tr>
			<td>Item Code</td>
			<td><input type="text" id="id-item-itemcode"
				name="name-item-itemcode" class="class-item" disabled="disabled"
				value="<?php print $item->getItemCode();?>"></td>
		</tr>
		<tr>
			<td>Item Name</td>
			<td><input type="text" id="id-item-name" name="name-item-name"
				class="class-item" value="<?php print $item->getItemName();?>"></td>
		</tr>
		<tr>
			<td>Cost Price</td>
			<td><input type="text" id="id-item-costprice"
				name="name-item-costprice" class="class-item"
				value="<?php print $item->getCostPrice();?>"></td>
		</tr>
		<tr>
			<td>Selling Price</td>
			<td><input type="text" id="id-item-sellprice"
				name="name-item-sellprice" class="class-item"
				value="<?php print $item->getSellingPrice();?>"></td>
		</tr>
		<tr>
			<td>Unit</td>
			<td><input type="text" id="id-item-unit" name="name-item-unit"
				class="class-item" value="<?php print $item->getUnit();?>"></td>
		</tr>
		<tr>
			<td>Remarks</td>
			<td><textarea id="id-item-remarks" name="name-item-remarks">
			<?php  print $item->getRemarks();?>
						</textarea></td>
		</tr>
		<tr>
			<td colspan="2">
			<input class='button primary' type="submit" value="Update Item"> 
			<input class='button' type="reset" value="Reset">
			<input type="hidden" name="update-item" value="<?php print $item->getItemCode()?>">
			<input type="hidden" name="postAction" value="updateitem">
			</td>
		</tr>
	</table>
</form>


			<?php
	}
	
	function issueItem(){
		
		$area=new Area();
		$farmer=new Farmer();
		$areas=$area->getAll();
		$s=new Season();
		$seasons=$s->getAll();
		$c=new Center();
		$centers=$c->getAll();

		/*
		 * setting areas javascript  array
		 */
		$j_areas=array();
		$i=0;
		foreach ($areas as $temp){
			$j_areas[$i]['label']=$temp->getName();
			$j_areas[$i]['value']=$temp->getId();
			$i++;
		}
		$i=0;

		/*
		 * setting centers array for javascript
		 */

		$j_centers=array();
		foreach ($centers as $tem){
			$j_centers[$i]['label']=$tem->getName();
			$j_centers[$i]['value']=$tem->getId();
			$i++;
		}

		/*
		 *
		 * setting farmer javascript array
		 */

		$farmers=$farmer->getAll();
		$j_farmers=array();
		$i=0;

		foreach ($farmers as $temp){
			$j_farmers[$i]['label']=$temp->getNic();
			$j_farmers[$i]['value']=$temp->getNic();
			$j_farmers[$i]['id']=$temp->getFullName();
			$i++;
		}
		/*
		 *setting items javascripts array
		 */
		$itm=new Item();
		$items=$itm->getAll();
		$j_items=array();
		$i=0;
		foreach ($items as $tmp){
			$j_items[$i]['label']=$tmp->getItemCode();
			$j_items[$i]['value']=$tmp->getSellingPrice();
			$i++;
		}

		?>
<script type="text/javascript">
		
				$(document).ready(function(){
					/*this is date picker*/
				var centers=[];	
					/*autocomplete*/
					var availableTags = <?php print json_encode($j_areas)?>
		/* 
					         		$( "#id-itemissue-1-area" ).autocomplete({
					         			source: availableTags,
					         			select: function(event,ui){
					         			console.log(availableTags);
					         				$( "#id-itemissue-1-area" ).val(ui.item.label);
					         				$( "#id-hidden-itemissue-1-area" ).val(ui.item.value);
											//getting the related center set
											
					         				return false;
					         			}
					         			
					         			
					         		});
									for farmer id autocomplete
									*/
					         		$( "#id-itemissue-1-farmerid" ).autocomplete({
					         			source: <?php print json_encode($j_farmers)?>,
					         			select: function(event,ui){
					         				
					         				$( "#id-itemissue-1-farmerid" ).val(ui.item.label);
					         				$( "#id-hidden-itemissue-1-farmerid" ).val(ui.item.value);
					         				$( "#id-itemissue-1-farmername" ).val(ui.item.id);

					         				

					         				
					         				return false;
					         			}
					         			
					         			
					         		});
					         		/* 
					         			item autocomplete 
					         		*/

									$( ".itemCode" ).autocomplete({
					         			source: <?php print json_encode($j_items)?>,
					         			select: function(event,ui){
						         			id=$(this).attr('id');
					         				
					         				splt=id.split('-');
					         				row=splt[2];
					         				col=splt[3];
					         				if(!checkItemExist(ui.item.label)){
						         				$(this).val(ui.item.label);
						         				$("#id-itemissue-"+row+"-4").val(ui.item.value); 				
						         				return false;
					         				}else {
												alert("Cannot enter same item more than once.");
												$(this).val("");
												return false;
						         				}
					         				
					         			}
					         			
					         			
					         		});
					         		/*
					         			center id autocomplete			         		
					         		*/
		
						         		
					         			$( "#id-itemissue-1-center" ).autocomplete({
											source:getAllCenters(),
						         			select: function(event,ui){
						         			
						         				$( "#id-itemissue-1-center" ).val(ui.item.label);
						         				$( "#id-hidden-itemissue-1-center" ).val(ui.item.value);
						         				
						         				return false;
						         			}
						         			
						         			
						         		});
			
					         		
					
				});

		function getAllCenters(){
			var result;
			$.ajax({
				url:"ajax_index.php?object=system.area.Center->j_getCentersByAreaForAC&params=null",
				type:'get',
				dataType:"json",
				async:false,
				success:function(d){
					result=d.body;
					console.log(d.body);
					}

			});
			return result;
			}
		
		function checkItemExist(code){
			numOfRows=($("#id-table1-itemissue-lower tr").length)-1;
			flag=false;
			for(i=0;i<numOfRows;i++){
					if($("#id-itemissue-"+i+"-0").val()==code){
						flag=true;
						}
				
				}
			return flag;
			
			}
	
				
		</script>


<h3 class='well'>Item issuing window</h3>
<div>
	<form action="?page=com_item" method="post"
		onsubmit="return validateItemIssueForm()" id="form-itemIssue">
		<table class='table small' style='' id='id-table1-itemissue-upper'>
			<tr>
				<!-- 
						<td>Area ID</td>
						<td><input type='text' id='id-itemissue-1-area'
							name='name-itemissue-1-area' /> <input type='hidden'
							id='id-hidden-itemissue-1-area' name='name-hidden-itemissue-1-area'
							value="" /></td>
							
						 -->
				<td>Season</td>
				<td><select id='id-itemissue-1-season'
					name='name-itemissue-1-season'>
						<option value="-1" class="class-itemissue-lower-cell">Select a
							Season</option>
							<?php
							foreach ($seasons as $season){
								print "<option value='".$season->getId()."'>";
								print $season->getName();
								print "</option>";
							}
							?>

				</select>
				</td>


				<td>Receipt No</td>
				<td><input type='text' id='id-itemissue-1-receipt'
					name='name-itemissue-1-receipt' class="class-itemissue-lower-cell" />
				</td>
			</tr>
			<tr>
				<td>Farmer ID</td>
				<td><input type='text' id='id-itemissue-1-farmerid'
					name='name-itemissue-1-farmerid' class="class-itemissue-lower-cell" />
					<input type="hidden" id='id-hidden-itemissue-1-farmerid'
					name='name-hidden-itemissue-1-farmerid' /></td>
				<td>Date</td>
				<td><input type='text' id='id-itemissue-1-date'
					name='name-itemissue-1-date' class="class-itemissue-lower-cell" />
				</td>
			</tr>
			<tr>
				<td>Center</td>
				<td><input type='text' id='id-itemissue-1-center'
					name='name-itemissue-1-center' class="class-itemissue-lower-cell" />
					<input type='hidden' id='id-hidden-itemissue-1-center'
					name='name-hidden-itemissue-1-center' /></td>
				<td>Farmer Name</td>
				<td><input type='text' id='id-itemissue-1-farmername'
					name='name-itemissue-1-farmername'
					class="class-itemissue-lower-cell" /></td>
			</tr>

		</table>
		<hr>
		<table class='table small' style='' id='id-table1-itemissue-lower'
			cellpadding="0" cellspacing="0">

			<tr>
				<td align='center'>Item Code</td>
				<td align='center'>Description</td>
				<td align='center'>Unit</td>
				<td align='center'>Quantity</td>
				<td align='center'>Rate</td>
				<td align='center'>Value</td>
			</tr>
			<?php
			for($i=0;$i<5;$i++){
				print "<tr>";
				for($j=0;$j<6;$j++){
					if($j==0){
						print "<td align ='center'><input type='text'  id='id-itemissue-$i-$j' name='name-itemissue-$i-$j' class='class-itemissue-cell itemCode' onkeyup='goThere(event,this.id)'/></td>";
					}else if($j==3){
						print "<td align ='center'><input type='text'  id='id-itemissue-$i-$j' name='name-itemissue-$i-$j' class='class-itemissue-cell ' onblur='calculateValue(this.id,this.value)' onkeyup='goThere(event,this.id)'/></td>";
					}else{
						print "<td align ='center'><input type='text'  id='id-itemissue-$i-$j' name='name-itemissue-$i-$j' class='class-itemissue-cell '  onkeyup='goThere(event,this.id)'/></td>";
					}

				}
				print "</tr>";
			}
	?>
		</table>
		<table class='table small' id='id-itemissue-bottom'>
			<tr>
				<td colspan="4">&nbsp;</td>
				<td><span>Total</span></td>
				<td><input type='text' id='id-itemissue-total' /></td>
			</tr>
		</table>

		<input type="submit"> <input type="reset"> <input type="hidden"
			name="postAction" value="saveitemissue"> <input type="hidden"
			name="row-count" id="row-count" value="5"> <input type="button"
			onclick="addRowtoTable('id-table1-itemissue-lower')" value="Add row">
	</form>
</div>


			<?php
	}
	
	/*
	 * Item viewer implementation 
	 */
	
	
	
	function viewIssueItem(){
		
		$s=new Season();
		$seasons=$s->getAll();
		
		$f=new Farmer();
		$farmers=$f->getAll();
		$j_farmers=array();
		$i=0;
		
		$c=new Center();
		$centers=$c->getAll();
		foreach ($farmers as $temp){
			$j_farmers[$i]['label']=$temp->getNic();
			$j_farmers[$i]['value']=$temp->getNic();
			$j_farmers[$i]['id']=$temp->getFullName();
			$i++;
		}
		
	$i=0;
		$j_centers=array();
		foreach ($centers as $tem){
			$j_centers[$i]['label']=$tem->getName();
			$j_centers[$i]['value']=$tem->getId();
			$i++;
		}
		
		
		?>
<script type="text/javascript">
		$(document).ready(function(){
					$('#id-issueview-date').datepicker({dateFormat: 'yy-mm-dd'});

					$('#id-issueview-nic').autocomplete({
						source:<?php print json_encode($j_farmers)?>,
		         		select: function(event,ui){
			         			
		         				$( "#id-issueview-nic" ).val(ui.item.label);
		         				$( "#id-hidden-issueview-nic" ).val(ui.item.value);
		         				
		         				return false;
		         			}
					});

					/* centers auto complete 
					*/
					$('#id-issueview-center').autocomplete({
						source:<?php print json_encode($j_centers)?>,
								
		         		select: function(event,ui){
			         			
		         				$( "#id-issueview-center" ).val(ui.item.label);
		         				$( "#id-hidden-issueview-center" ).val(ui.item.value);
		         				
		         				return false;
		         			}
					});
					
					
			});
		
		</script>
<h3 class='well'>View Item Issues</h3>
<table class='table' cellpadding="5" cellspacing="0"
	id='id-issueview-filter'>
	<tr>
		<td>Farmer NIC</td>
		<td><input type="text" id="id-issueview-nic" name="name-issueview-nic">
		<input type="hidden" id="id-hidden-issueview-nic" name="name-hidden-issueview-nic" value="">
		</td>
		<td>Farmer center</td>
		<td><input type="text" id="id-issueview-center"
			name="name-issueview-center">
			<input type="hidden" id="id-hidden-issueview-center"
			name="name-hidden-issueview-center" value="">
		</td>
	</tr>
	<tr>
		<td>Farmer Season</td>
		<td><select id="id-issueview-season" name="name-issueview-season">
			<option value='-1'>Select a Season</option>
			<?php 
			

			foreach ($seasons as $temp){
				print "<option value='".$temp->getId()."'>";
				print $temp->getName();
				print "</option>";
			}
			
			?>
			
			</select></td>
		<td>Date</td>
		<td>
			<input type="text" id="id-issueview-date" name="name-issueview-date">		
		<td>
	
	</tr>
	<tr>
	<td colspan='4'><button class ='button 'onclick="searchItemIssue();"><i class='icon-search'></i>search </button></td>
	</tr>

</table>

<div id="id-issueview-window">

</div>


		<?php

	}
	
	
	function editItemIssue(){
		
		$farmer=getParam("f");
		$center=getParam('c');
		$date=getParam("d");
		$season=getParam("s");
		$receipt=getParam("r");
		
		$s=new Season();
		$seasons=$s->getAll();
		
		$farmerObj=new Farmer();
		$farmers=$farmerObj->getAll();
			
		$ce=new Center();
		$centers=$ce->getAll();	
		$f=new FarmerBelongs();
		$fi=new FarmerItem();
		
		$i=new Item();
		$items=$i->getAll();
		
		$j_items=array();
		$i=0;
		foreach ($items as $tmp){
			$j_items[$i]['label']=$tmp->getItemCode();
			$j_items[$i]['value']=$tmp->getSellingPrice();
			$i++;
		}
		
		$i=0;
		foreach ($farmers as $temp){
			$j_farmers[$i]['label']=$temp->getNic();
			$j_farmers[$i]['value']=$temp->getNic();
			$j_farmers[$i]['id']=$temp->getFullName();
			$i++;
		}
		$i=0;
		$j_centers=array();
		foreach ($centers as $tem){
			$j_centers[$i]['label']=$tem->getName();
			$j_centers[$i]['value']=$tem->getId();
			$i++;
		}
		
		if($f->getFarmerBelong($farmer, $season, $center)){
			
			$fmBelId=$f->getFarmerBelong($farmer, $season, $center)->getId();
			$issues=$fi->getItemIssueByFamerDate($fmBelId, $date,$receipt);
			
			$old_issue=array("belong"=>$fmBelId,"date"=>$date,"receipt"=>$receipt);
			?>
			<script type="text/javascript">

			$(document).ready(function(){
				/*this is date picker*/
			var centers=[];	
				/*autocomplete*/
				
	/* 
				         		$( "#id-itemissue-1-area" ).autocomplete({
				         			source: availableTags,
				         			select: function(event,ui){
				         			console.log(availableTags);
				         				$( "#id-itemissue-1-area" ).val(ui.item.label);
				         				$( "#id-hidden-itemissue-1-area" ).val(ui.item.value);
										//getting the related center set
										
				         				return false;
				         			}
				         			
				         			
				         		});
								for farmer id autocomplete
								id-itemissue-1-farmerid
								*/
				         		$( "#id-itemissue-1-farmerid" ).autocomplete({
				         			source: <?php print json_encode($j_farmers)?>,
				         			select: function(event,ui){
				         				
				         				$( "#id-itemissue-1-farmerid" ).val(ui.item.label);
				         				$( "#id-hidden-itemissue-1-farmerid" ).val(ui.item.value);
				         				$( "#id-itemissue-1-farmername" ).val(ui.item.id);

				         				

				         				
				         				return false;
				         			}
				         			
				         			
				         		});
				         		/* 
				         			item autocomplete 
				         		*/

								$( ".itemCode" ).autocomplete({
				         			source: <?php print json_encode($j_items)?>,
				         			select: function(event,ui){
					         			id=$(this).attr('id');
				         				
				         				splt=id.split('-');
				         				row=splt[2];
				         				col=splt[3];
				         				if(!checkItemExist(ui.item.label)){
					         				$(this).val(ui.item.label);
					         				$("#id-itemissue-"+row+"-4").val(ui.item.value); 				
					         				return false;
				         				}else {
											alert("Cannot enter same item more than once.");
											$(this).val("");
											return false;
					         				}
				         				
				         			}
				         			
				         			
				         		});
				         		/*
				         			center id autocomplete			         		
				         		*/
	
					         		
				         			$( "#id-itemissue-1-center" ).autocomplete({
					         			source:<?php print json_encode($j_centers)?>,
					         			
					         			select: function(event,ui){
					         			
					         				$( "#id-itemissue-1-center" ).val(ui.item.label);
					         				$( "#id-hidden-itemissue-1-center" ).val(ui.item.value);
					         				
					         				return false;
					         			}
					         			
					         			
					         		});
		
				         		
				
			});
			function checkItemExist(code){
				numOfRows=($("#id-table1-itemissue-lower tr").length)-1;
				flag=false;
				for(i=0;i<numOfRows;i++){
						if($("#id-itemissue-"+i+"-0").val()==code){
							flag=true;
							}
					
					}
				return flag;
				
				}
		
		
</script>
			
	
			
			
			<h4>Update item issues</h4>
			<form action="?page=com_item" method="post"
		onsubmit="return validateItemIssueForm()" id="form-itemIssue">
		<table border='1' style='' id='id-table1-itemissue-upper'>
			<tr>
			
				<td>Season</td>
				<td><select id='id-itemissue-1-season'	name='name-itemissue-1-season' disabled="disabled">
						<option value="-1" class="class-itemissue-lower-cell" >Select a
							Season</option>
							<?php
							foreach ($seasons as $temp){
								if($temp->getId()==$season){
									print "<option value='".$temp->getId()."' selected='selected'>";
									print $temp->getName();
									print "</option>";
								}else{
									print "<option value='".$temp->getId()."'>";
									print $temp->getName();
									print "</option>";
								}
							}
							?>

				</select>
				</td>


				<td>Receipt No</td>
				<td>
					<input type='text' 
							id='id-itemissue-1-receipt' 
							name='name-itemissue-1-receipt' 
							class="class-itemissue-lower-cell"
							value="<?php if($issues)print $issues[0]->getReceipt()?>" />
				</td>
			</tr>
			<tr>
				<td>Farmer ID</td>
				<td><input type='text' 
							id='id-itemissue-1-farmerid'
							name='name-itemissue-1-farmerid' 
							class="class-itemissue-lower-cell" disabled="disabled"
							value="<?php print $farmer?>" />
							
					<input type="hidden" 
							id='id-hidden-itemissue-1-farmerid'
							name='name-hidden-itemissue-1-farmerid'
							value="<?php print $farmer?>" />
				</td>
				<td>Date</td>
				<td>
					<input type='text' 
							id='id-itemissue-1-date'
							name='name-itemissue-1-date' 
							class="class-itemissue-lower-cell"
							value="<?php print $date?>" />
				</td>
			</tr>
			<tr>
				<td>Center</td>
				<td>
					<input type='text' 
							id='id-itemissue-1-center'
							name='name-itemissue-1-center' 
							class="class-itemissue-lower-cell" disabled="disabled"
							value="<?php print $ce->getCenterById($center)->getName()?>" />
					<input type='hidden' 
							id='id-hidden-itemissue-1-center'
							name='name-hidden-itemissue-1-center'
							value="<?php print $center?>" />
				</td>
				<td>Farmer Name</td>
				<td>
					<input type='text' 
							id='id-itemissue-1-farmername'
							name='name-itemissue-1-farmername'
							class="class-itemissue-lower-cell" 
							value="<?php print $farmerObj->getFarmerByNIC($farmer)->getFullName()?>"/></td>
			</tr>

		</table>
		<hr>
		<table border='1' style='' id='id-table1-itemissue-lower'
			cellpadding="0" cellspacing="0">

			<tr>
				<td align='center'>Item Code</td>
				<td align='center'>Description</td>
				<td align='center'>Unit</td>
				<td align='center'>Quantity</td>
				<td align='center'>Rate</td>
				<td align='center'>Value</td>
			</tr>
			<?php
			/*
			
			
*/			$item=new Item();
			$count=0;
			$total=0;
			foreach ($issues as $temp){
				/*
				 * if item is deleted this brings an exception.that should be handled
				 */
				$i=$item->getItemByCode($temp->getItemCode())->getSellingPrice();	
			
				print "<tr>";
				print "<td align ='center'><input type='text' value='".$temp->getItemCode()."' autocomplete='off' id='id-itemissue-$count-0' name='name-itemissue-$count-0' class='class-itemissue-cell itemCode' onkeyup='goThere(event,this.id)'/></td></td>";
				print "<td align ='center'><input type='text' value='".$temp->getDesc()."' autocomplete='off' id='id-itemissue-$count-1' name='name-itemissue-$count-1' class='class-itemissue-cell '  onkeyup='goThere(event,this.id)'/></td>";
				print "<td align ='center'><input type='text' value='".$temp->getUnit()."' autocomplete='off' id='id-itemissue-$count-2' name='name-itemissue-$count-2' class='class-itemissue-cell '  onkeyup='goThere(event,this.id)'/></td>";
				print "<td align ='center'><input type='text' value='".$temp->getQuantity()."' autocomplete='off' id='id-itemissue-$count-3' name='name-itemissue-$count-3' class='class-itemissue-cell ' onblur='calculateValue(this.id,this.value)' onkeyup='goThere(event,this.id)'/></td>";
				print "<td align ='center'><input type='text' value='".$i."' autocomplete='off' id='id-itemissue-$count-4' name='name-itemissue-$count-4' class='class-itemissue-cell '  onkeyup='goThere(event,this.id)'/></td>";
				print "<td align ='center'><input type='text' value='".$temp->getAmount()."' autocomplete='off' id='id-itemissue-$count-5' name='name-itemissue-$count-5' class='class-itemissue-cell '  onkeyup='goThere(event,this.id)'/></td>";
				print "</tr>";
				$total+=$temp->getAmount();
				$count++;
			}
			/*
			 * setting total
			 */
			
			?>


		</table>
		<table id='id-itemissue-bottom'>
			<tr>
				<td colspan="4">&nbsp;</td>
				<td><span>Total</span></td>
				<td><input type='text' id='id-itemissue-total' value="<?php print $total ?>"  /></td>
			</tr>
		</table>

		<input type="submit">
			<input type="reset">
			<input type="hidden"	
					name="postAction" 
					value="updateitemissue"> 
			<input type="hidden"
					name="row-count" 
					id="row-count" 
					value="5"> 
			<input type="hidden"
					name="id-update-form" 
					id="id-update-form" 
					value="<?php print $fmBelId?>"> 
			<input type="hidden"
					name="id-old-issue" 
					id="id-update-form" 
					value='<?php print serialize($old_issue)?>'> 
					
			<input type="button"
					onclick="addRowtoTable('id-table1-itemissue-lower')" 
					value="Add row">
	</form>
</div>
			
			
			
			
			
			
			<?php 
			
			
			
			
		}else return false;
		
		
		
		
	}
	

}



?>