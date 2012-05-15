<?php
hImport("system.db.HDatabase");
hImport("system.user.HUser");
hImport("system.var.StringHelper");
hImport("support.table.HTableBuilder");
hImport("support.table.HTableObject");
hImport("support.tableObject.tableObject");
hImport("support.form.HFormBuilder");

class HAuthenticator{
	
	private $db;
	public function HAuthenticator(){
		$this->db=new HDatabase();
		$this->db->connect();
		
	}
	public function getLoginForm(){
		global $log;
		
			$formBlder=new HFormBuilder("LoginManager.php", "post");
			$form=$formBlder->getForm();
			$form->setLayout(DEFAULT_LAYOUT);
			$form->setClass("h-class-loginform");
			
			//set the fields 
			$inputTO=new HTableObject(INPUT);
			$username=new Input("username", "text");
			$username->setID("login-username");
			$inputTO->addInput($username);
			
			$inputTO2=new HTableObject(INPUT);
			$password=new Input("password", "password");
			$password->setID("login-password");
			$inputTO2->addInput($password);
			
			$inputTO3=new HTableObject(INPUT);
			$submit=new Input("submit", "submit");
			$submit->setDefaultValue("login");
			$inputTO3->addInput($submit);
			
			$fields=array(
							array('label'=>'username','object'=>$inputTO),
					  		array('label'=>'password','object'=>$inputTO2),
					 		array('label'=>'','object'=>$inputTO3)
					  		);
			$form->addFields($fields);
			
			return $form->renderForm();
		
		
	}
	
	public function isUser($username){
		/*
		 * this function will authenticate whether given user is available in the sytem 
		 */
		
		$this->db->resetResult();
		$this->db->select("fm_user","userId","userId='".$username."'");
		$res=$this->db->getResult();
		
		if($res){
			return true;
			
		}else return false;
		
	}
	
	public function saveUser(HUser $user){
		
		
		$this->db->resetResult();
		global $mainframe,$log;
		$userArray=array($user->getUsername(),$user->getPassword(),$user->getUserType(),$user->getFname(),$user->getLname(),$user->getOfficeCode(),$user->getAvatar());
		
		if(!$this->isUser($user->getUsername())){
			
			if($this->db->insert("fm_user",$userArray ,"userId,password,userType,fname,lname,officeCode,avatar")){
				$mainframe->redirect("user saved");
				
			}else{
				/*
				 * still this is onlyu for log .latter the mainframe class should be implemented
				 */
				$mainframe->redirect("user cannot be saved");
			}
		}else {
			
			$mainframe->redirect("user exist");
		}
		
		
	}
	public function updateUser($username,HUser $user){
		
		
		
		
	}
	
	public function authUser($username,$password){
		
		$password=StringHelper::cleanString($password);
		//clean the db object 
		$this->db->resetResult();
		$this->db->select("fm_user","password","userId='".$username."'");
		$res=$this->db->getResult();
		
		if($res[0]['password']==md5($password)){
			
			return true;
		}else return false;
		
	}
	public function saveState($username){
		
	
	
		
		$user=new HUser($username);
		$origin_user=$user->getUserById($username);
		
		$_SESSION['SESS_MEMBER_ID'] =$username;
		$_SESSION['SESS_FIRST_NAME'] = $origin_user->getFname();
		$_SESSION['SESS_LAST_NAME'] =$origin_user->getLname();
		$_SESSION['SESS_USERTYPE'] =$origin_user->getUserType();
		$_SESSION['SESS_USERAVATAR'] =$origin_user->getAvatar();
		session_write_close();
		header("location:index.php");
		exit();
		
	}
	
	public function wrongUser(){
		
		header("location:index.php?login_attempt=1");
		exit();
		
		
	}
	
	
	
}






?>