<?php
hImport("system.db.HDatabase");

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
	public function HUser($username){
		
		$this->username=$username;
		
		
	}
	/*
	 * setting setters 
	 * 
	 */
	
	public function setUsername($usrname){
		
		$this->username=$usrname;
	}
	public function setPassword($password){
		
		$this->password=md5($password);
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
	
	
	
	
}




?>