<?php
hImport("core.user.HUser");
class HTML_renderer{
	
	public function addUser(){
		
		$user=new HUser();
		$prevs=$user->getUserpreviledges();
		?>
		<h3 class='well'>Add user to system : </h3>
	<form action="?page=com_staff" method="post" enctype="multipart/form-data"	onsubmit="return validateStaffform()" id="form-user">
		<table class='table'>
			<tr>
				<td>Username</td>
				<td><input type="text" id="id-user-uname" name="name-user-uname" class='class-user'></td>
			</tr>
			<tr>
				<td>First name</td>
				<td><input type="text" id="id-user-fname" name="name-user-fname" class='class-user'></td>
			</tr>
			<tr>
				<td>Last name</td>
				<td><input type="text" id="id-user-lname" name="name-user-lname" class='class-user'></td>
			</tr>
			<tr>
			<tr>
				<td>Password</td>
				<td><input type="password" id="id-user-password" class='class-user' name="name-user-password"></td>
			</tr>
			<tr>
			<tr>
				<td>Confirm Password</td>
				<td><input type="password" id="id-user-c_password" class='class-user' name="name-user-c_password"></td>
			</tr>
			<tr>
				<td>User type</td>
				<td>
					<select  id="id-user-type" name="name-user-type">
					<option value="-1">Select user type</option>
					
					<?php 
					foreach ($prevs as $temp){
						print "<option value='".$temp['name']."'>";
						print $temp['name'];
						print "</option>";
					}
					
					
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Avatar</td>
				<td><input type="file" id="id-user-avatar" name="name-user-avatar"><br>
				<span>Max file size : 2 MB</span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
				<input class='button primary' type="submit" value="Save User"> 
				<input class='button ' type="reset" value="Reset"> 
				<input type="hidden" name="postAction"	value="saveuser">
				</td>
			</tr>
		</table>
	</form>
		
		
		
		<?php 
		
		
	}
	function viewUsers(){
		$u=new HUser();
		$users=$u->getAll();
		
		
		$filepath="images/avatars/";
		if($users){
			
			print "<table border='1'>";
			
			foreach ($users as $temp){
			
				if($temp->getUserType()!='superadmin'){
					print "<tr>";
					print "<td>";
					print "<img src='".$filepath.$temp->getAvatar()."' width='120' height='100'/>";
					print "</td>";
					print "<td><div>";
					print "<span>".$temp->getFname()." ".$temp->getLname()."</span>";
					print "<p>".$temp->getUserType()."</p>";
					print "<p>".$temp->getOfficeCode()."</p>";
					print "<a href='index.php?page=com_staff&getAction=edit&id=".$temp->getUsername()."' >Edit user</a>";
					print "<a href='index.php?page=com_staff&getAction=del&id=".$temp->getUsername()."' onclick='return confirmDelete()' >Delete user</a>";
					print "<div></td></tr>";
				}
				
				
			}
		}
		
		
	}
	function editUser(){
		
		$username=getParam('id');
		$u=new HUser();
		$user=$u->getUserById($username);
		$prevs=$u->getUserpreviledges();
		
			?>
	<h3 class='well'>Update user data</h3>
	<form action="?page=com_staff" method="post" enctype="multipart/form-data"	onsubmit="return validateStaffform()" id="form-user">
		<table class='table'>
			<tr>
				<td>Username</td>
				<td><input type="text" id="id-user-uname" name="name-user-uname"  disabled="disabled" value='<?php print $user->getUsername()?>'></td>
			</tr>
			<tr>
				<td>First name</td>
				<td><input type="text" id="id-user-fname" name="name-user-fname"  value='<?php print $user->getFname()?>'></td>
			</tr>
			<tr>
				<td>Last name</td>
				<td><input type="text" id="id-user-lname" name="name-user-lname"   value='<?php print $user->getLname()?>'></td>
			</tr>
			<tr>
			<tr>
				<td>Password</td>
				<td><input type="password" id="id-user-password" name="name-user-password" class='class-user'></td>
			</tr>
			<tr>
			
				<td>User type</td>
				<td>
					<select  id="id-user-type" name="name-user-type">
					<option value="-1">Select user type</option>
					
					<?php 
					foreach ($prevs as $temp){
						if($temp['name']==$user->getUserType()){
							print "<option value='".$temp['name']."' selected='selected'>";
							print $temp['name'];
							print "</option>";
						}else{
							print "<option value='".$temp['name']."'>";
							print $temp['name'];
							print "</option>";
						}
					}
					
					
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Avatar</td>
				<td><input type="file" id="id-user-avatar" name="name-user-avatar" ><br>
				<span>Max file size : 2 MB</span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input class='button primary' type="submit" value="Update User"> 
					<input class='button' type="reset" value="Reset"> 
					<input type="hidden" name="update-user"	value="<?php print $user->getUsername()?>">
					<input type="hidden" name="postAction"	value="updateuser">
				</td>
			</tr>
		</table>
	</form>
		
		
		
		<?php 
	}
	
	function addExec(){
		/*
		 * this executive user compontent ,scenario is not  clear well.Should be implemented later
		 * 
		 */
		
		?>
	<h3>Add executive person</h3>		
	<form action="?page=com_staff" method="post" enctype="multipart/form-data"	onsubmit="return validateStaffform()" id="form-user">
		<table border="1">
			<tr>
				<td>Name</td>
			<td><input type="text" id="id-id-execuser-password-uname" name="name-id-execuser-password-uname"  ></td>
			</tr>
			
		
			<tr>
			<tr>
				<td>Address</td>
				<td><textarea id="id-execuser-address" name="name-execuser-address" rows="3" cols="20"></textarea></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Save Executive User"> 
					<input	type="reset" value="Reset"> 
					<input type="hidden" name="postAction"	value="saveexecuser">
				</td>
			</tr>
			
			
		</table>
	</form>
		
		
		
		<?php 
		
	}
	
	
}




?>