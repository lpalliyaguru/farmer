<?php
hImport("core.db.HDatabase");

class HUser{
	
	private $username;
	private $fname;
	private $lname;
	private $avatar;
	private $type;
	private $officeCode;
	private $password;
	/*
	 * initializing the constructor
	 */
	public function HUser($username=""){
		
		$this->username=$username;
		$db=new HDatabase();
		/*
		 * getting the user data from the db 
		 */
		$db->connect();
		$db->select("fm_user","*","userId='".$this->username."'");
		$res=$db->getResult();
		/*
		 * setting user attribs 
		 */
		$this->fname=$res[0]['fname'];
		$this->lname=$res[0]['lname'];
		$this->officeCode=$res[0]['officeCode'];
		$this->type=$res[0]['userType'];
		$this->avatar=$res[0]['avatar'];
		/*
		 * return the user object
		 */
		
	}
	/*
	 * setting setters 
	 * 
	 */
	
	public function setUsername($usrname){
		
		$this->username=$usrname;
	}
	public function setPassword($password){
		
		$this->password=$password;
	}
	
	public function setFname($fname){
		
		$this->fname=$fname;
	}
	
	public function setLname($lname){
		
		$this->lname=$lname;
	}
	
	public function setAvatar($avatar){
		
		$this->avatar=$avatar;
	}
	public function setUserType($type){
		
		$this->type=$type;
	}
	
	public function setOfficeCode($code){
		
		$this->officeCode=$code;
	}
	/*
	 * setting getters 
	 */
	public function getUsername(){
		
		return $this->username;
	}
	public function getPassword(){
		
		return $this->password;
	}
	
	
	public function getFname(){
		
		return $this->fname;
	}
	
	public function getLname(){
		
		return $this->lname;
	}
	
	public function getAvatar(){
		
		return $this->avatar;
	}
	public function getUserType(){
		
		return $this->type;
	}
	
	public function getOfficeCode(){
		
		return $this->officeCode;
	}		
	
	public function getAll(){
		
		$db=new HDatabase();
		/*
		 * getting the user data from the db 
		 */
		$users=array();
		$db->connect();
		$db->select("fm_user","*");
		if($res=$db->getResult()){
			
			foreach ($res as $temp){
				$user=new HUser();
				$user->setUsername($temp["userId"]);
				$user->setUserType($temp["userType"]);
				$user->setFname($temp["fname"]);
				$user->setLname($temp["lname"]);
				$user->setOfficeCode($temp["officeCode"]);
				$user->setAvatar($temp["avatar"]);
				array_push($users, $user);
			}
			return $users;
		}
		
		/*
		 * setting user attribs 
		 */
		$this->fname=$res[0]['fname'];
		$this->lname=$res[0]['lname'];
		$this->officeCode=$res[0]['officeCode'];
		$this->type=$res[0]['userType'];
		$this->avatar=$res[0]['avatar'];
		/*
		 * return the user object
		 */
		return $this;
	}
	
	public function getUserById($username){
		
		$db=new HDatabase();
		/*
		 * getting the user data from the db 
		 */
		$db->connect();
		$db->select("fm_user","*","userId='".$username."'");
		$res=$db->getResult();
		/*
		 * setting user attribs 
		 */
		$this->username=$res[0]['userId'];
		$this->fname=$res[0]['fname'];
		$this->lname=$res[0]['lname'];
		$this->officeCode=$res[0]['officeCode'];
		$this->type=$res[0]['userType'];
		$this->avatar=$res[0]['avatar'];
		/*
		 * return the user object
		 */
		return $this;
	}
	/*
	 * this function is not checked yet
	 */
	public function saveUser(HUser $user){
		
		$db=new HDatabase();
		$db->connect();
		$values=array(	$user->getUsername(),
						$user->getUserType(),
						$user->getPassword(),
						$user->getFname(),
						$user->getLname(),
						$user->getOfficeCode(),
						$user->getAvatar()
						);
		
		//$rows="userId,userType,password,fname,lname,officeCode,avatar";
		if($db->insert("fm_user", $values)){
			return true;
		}else return false;
		
	}
	
	public function deleteUser($id){
		$db=new HDatabase();
		$db->connect();
		if($db->delete("fm_user","userId='$id'")){
			
			return true;
		}else{
			return false;
		}
		
	}
	
	public function  getUserpreviledges(){
		$db=new HDatabase();
		$db->connect();
		$db->select("fm_previledges","*");
		$res=$db->getResult();
		if($res){
			return $res;
			
		}else{
			return false;
		}
	}
	public function getUser(){
		return $this;
	}
	
	
	
	
}




?>