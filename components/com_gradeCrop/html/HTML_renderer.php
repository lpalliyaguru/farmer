<?php
hImport("system.farmer.Farmer");
hImport("system.season.Season");
class HTML_renderer{
	
	function addCrop(){
		/*
		 * generating farmer array for autocomplete
		 */
		$f=new Farmer();
		$farmers=$f->getAll();
		$j_farmers=array();
		$i=0;
		foreach ($farmers as $temp){
			$j_farmers[$i]['label']=$temp->getNic();
			$j_farmers[$i]['value']=$temp->getFullName();
			$i++;
		}
		/*
		 * setting season
		 */
		$s=new Season();
		$seasons=$s->getAll();
		
		
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#id-gradecrop-date').datepicker();
	$('#id-gradecrop-farmer').autocomplete({
		source:<?php print json_encode($j_farmers)?>,
		select:function(event,ui){
				$(this).val(ui.item.label);
				$('#id-gradecrop-farmername').val(ui.item.value);
				return false;
			}
		});

});
			




</script>
<h3>Farmer crop insertion</h3>
<form action="index.php?page=com_gradeCrop" method="post" onsubmit="validateForm();" id="id-gradecrop-form">
<table>
  <tr>
    <td>Area </td>
    <td>
    	<input type="text" id="id-gradecrop-area" name="name-gradecrop-area" onblur="generateTable(this.value)"/>
    	<input type="hidden" id="id-hidden-gradecrop-area" name="name-hidden-gradecrop-area" value=""/>
    </td>
    <td>Center</td>
    <td><input type="text" id="id-gradecrop-center" name="name-gradecrop-center"  />
    	<input type="hidden" id="id-hidden-gradecrop-center" name="name-hidden-gradecrop-center"  />
    </td>
  </tr>
  <tr>
    <td>Farmer No:</td>
    <td><input type="text" id="id-gradecrop-farmer" name="name-gradecrop-farmer" /></td>
     <td>Season :</td>
    <td>
    	<select >
    	<option value="-1">Select a season</option>
    		<?php 
    		foreach ($seasons as $temp){
    			print "<option value='".$temp->getId()."'>";
    			print $temp->getName();
    			print "</option>";
    			
    		}
    		
    		?>
    	</select>
    </td>
  </tr>
   <tr>
    <td>Slip No:</td>
    <td><input type="text"/></td>
     <td>Deliver Date : </td>
    <td><input type="text" id="id-gradecrop-date" name="name-gradecrop-date" /></td>
  </tr>
  <tr>
  <td>Farmer Name: </td>
  <td><input type="text" id="id-gradecrop-farmername" name="name-gradecrop-farmername"/></td>
    <td>Quality :</td>
    <td>
    	<label for="one">Good<input type="radio" id="one" name="quality_param" value="1" checked="checked"/></label>
    	<label for="second">Bad<input type="radio" id="second" name="quality_param" value="0"/></label>
    </td>
     
  
  </tr>
</table>
<div id="id-gradecrop-croptable">
<table border="1" width="100%">
<tr>
	<th>Grade 1</th>
	<th>Grade 2</th>
	<th>Grade 3</th>
	<th>Grade 4</th>
	<th>Grade 5</th>
	<th>Grade 6</th>
	<th>CRS</th>
	<th>Reject</th>
	<th>Net Total</th>
	<th>Gross Total</th>
</tr>
<tr>
<td align="center"><input type="text"/></td>
<td align="center"><input type="text"/></td>
<td align="center"><input type="text"/></td>
<td align="center"><input type="text"/></td>
<td align="center"><input type="text"/></td>
<td align="center"><input type="text"/></td>
<td align="center"><input type="text"/></td>
<td align="center"><input type="text"/></td>
<td align="center"><input type="text"/></td>
<td align="center"><input type="text"/></td>
</tr>
<tr><td colspan="7"></td>
	<td align="center"><input type="text"/></td>
	<td align="center"><input type="text"/></td>
	<td align="center"><input type="text"/></td>
</tr>
<tr>
<td colspan="10">
	<input type="submit">
	<input type="reset">
</td>

</tr>
</table>
</form>
</div>





<?php 		
	}
	
	
	
	
}





?>