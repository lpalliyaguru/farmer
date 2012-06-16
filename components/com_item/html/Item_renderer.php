		<?php
		
		class Item_renderer{
		
			function viewItems(){
		
				$item=new Item();
				$items=$item->getAll();
				print "<h3>View All Items</h3>";
				if($items){
					print "<table border='1'>";
					print "<tr><th align='center'>Item Code </th><th align='center'>Item Name</th><th align='center'>Cost Price </th><th align='center'>Selling Price</th><th align='center'>Unit</th><th align='center'>Remarks</th></tr>";
					foreach ($items as $i){
						print "<tr>";
						print "<td>".$i->getItemCode()."</td><td>".$i->getItemName()."</td>
						<td>".$i->getCostPrice()."</td><td>".$i->getSellingPrice()."</td><td>".$i->getUnit()."</td><td>".$i->getRemarks()."</td>";						
						print "<td><a href='?page=com_item&getAction=edit&id=".$i->getItemCode()."'>Edit<a></td>";
						print "<td><a href='?page=com_item&getAction=del&id=".$i->getItemCode()."' onclick='return confirmDelete()'>Delete<a></td>";
		
						print "</tr>";
					}
					print "</table>";
		
				}else{
					print "<p class='class-alert'><span></span>No items in the system!</p>";
				}
		
		
			}
			function addItems(){
				?>
		<h3>Add Items details</h3>
		<form action="?page=com_item" method="post"
			onsubmit="return validateitemform()" id="form-item">
			<table border="1">
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
					<td colspan="2"><input type="submit" value="Save Item"> <input
						type="reset" value="Reset"> <input type="hidden" name="postAction"
						value="saveitem">
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
		<h3>Add Items details</h3>
		<form action="?page=com_item" method="post"
			onsubmit="return validateitemform()" id="form-updateitem">
			<table border="1">
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
					<td colspan="2"><input type="submit" value="Update Item"> <input
						type="reset" value="Reset"> <input type="hidden" name="update-item"
						value="<?php print $item->getItemCode()?>"> <input type="hidden"
						name="postAction" value="updateitem">
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
				/*
				 * setting areas array
				 */
				$j_areas=array();
				$i=0;
				foreach ($areas as $temp){
					$j_areas[$i]['label']=$temp->getName();
					$j_areas[$i]['value']=$temp->getId();
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
				
				?>
		<script type="text/javascript">
		
				$(document).ready(function(){
					/*this is date picker*/
				var centers=[];	
					/*autocomplete*/
					var availableTags = <?php print json_encode($j_areas)?>
		
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
									/* for farmer id autocomplete
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
					         			center id autocomplete			         		
					         		*/
		
					         		$( "#id-itemissue-1-center" ).keydown(function(){
						         		var k=getCenters($('#id-hidden-itemissue-1-area').val());
						         		console.log(k);
					         			$( "#id-itemissue-1-center" ).autocomplete({
						         			source: k,
						         			select: function(event,ui){
						         				
						         				$( "#id-itemissue-1-center" ).val(ui.item.label);
						         				$( "#id-hidden-itemissue-1-center" ).val(ui.item.value);
						         				
						         				return false;
						         			}
						         			
						         			
						         		});
			
						         		});
					         		
					
				});
		
		function getCenters(id){
			var centers;
			$.ajax({
				url:"ajax_index.php",
				type:'post',
				dataType:"json",
				data:{'object':'system.area.Center->j_getCentersByArea','params':[id]},
				async:false,
				success:function(d){
					
					result=d;
				 	if(result.status=='true'){
				 		centers=result['body'];
					 	
						
					 	
					 	}else{
						 	
							centers=false;
							}
					 	
					}
			
			});
		
			return centers;	
			
		}
				
		</script>
		
		
		<h3>Item issuing window</h3>
		<div>
			<form action="?page=com_item" method="post"
				onsubmit="return validateItemIssueForm()" id="form-itemIssue">
				<table border='1' style='' id='id-table1-itemissue-upper'>
					<tr>
						<td>Area ID</td>
						<td><input type='text' id='id-itemissue-1-area'
							name='name-itemissue-1-area' /> <input type='hidden'
							id='id-hidden-itemissue-1-area' name='name-hidden-itemissue-1-area'
							value="" /></td>
						<td>Receipt No</td>
						<td><input type='text' id='id-itemissue-1-receipt'
							name='name-itemissue-1-receipt' /></td>
					</tr>
					<tr>
						<td>Farmer ID</td>
						<td><input type='text' id='id-itemissue-1-farmerid'
							name='name-itemissue-1-farmerid' /> <input type="hidden"
							id='id-hidden-itemissue-1-farmerid'
							name='name-hidden-itemissue-1-farmerid' /></td>
						<td>Date</td>
						<td><input type='text' id='id-itemissue-1-date'
							name='name-itemissue-1-date' /></td>
					</tr>
					<tr>
						<td>Center</td>
						<td><input type='text' id='id-itemissue-1-center'
							name='name-itemissue-1-center' />
							<input type='hidden' id='id-hidden-itemissue-1-center'
							name='name-hidden-itemissue-1-center' /></td>
						<td>Farmer Name</td>
						<td><input type='text' id='id-itemissue-1-farmername'
							name='name-itemissue-1-farmername' /></td>
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
					for($i=0;$i<5;$i++){
						print "<tr>";
						for($j=0;$j<6;$j++){
		
							print "<td align ='center'><input type='text'  id='id-itemissue-$i-$j' name='name-itemissue-$i-$j'/></td>";
		
		
						}
						print "</tr>";
					}
		
		
		
					?>
		
		
				</table>
				<table id='id-itemissue-bottom'>
					<tr>
						<td colspan="4">&nbsp;</td>
						<td><span>Total</span></td>
						<td><input type='text' id='id-itemissue-total' /></td>
					</tr>
				</table>
		
					<input type="submit"> 
					<input type="reset">
					<input type="hidden"  name="postAction"  value="saveitemissue">
					<input type="hidden"  name="row-count" id="row-count" value="">
					<input type="button"  onclick="addRowtoTable('id-table1-itemissue-lower')" value="Add row">
			</form>
		</div>
		
		
					<?php
			}
		
		
		}
		
		
		
		?>