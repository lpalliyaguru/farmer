<?php 
/*
 * starts the session 
 */
	session_start();
define("HEXEC", 1);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel='ICON' href='images/favicon.png' />
<title>Login Page | Information Management System</title>
<link href="css/index.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="libraries/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="libraries/js/jquery.cookie.js"></script>
<script type="text/javascript" src="libraries/js/jquery.effects.core.js"></script>


<script type="text/javascript">

function focusMe(){

	$('#login-username').focus();
	
}
$(document).ready(function(){
		setInterval("changeBg()", 1000*5*60);
		

	
});

function changeBg(){
	num=parseInt(Math.random()*10);
	if(num==0){
		num+=4;
		}
	console.log(num);
	 $('body').fadeOut('slow', function () {

         $('body').css({ 'background-image': 'url(images/backgrounds/'+num+'.jpg)' });

         $('body').fadeIn('slow');
	 });
}

</script>

</head>
<body onload="focusMe();">
<div id="content">
<?php


require_once 'includes/call.php';

hImport("support.login.HAuthenticator");
hImport("core.Logger");
hImport("core.Frame");
hImport("core.renderer.Renderer");
hImport("support.login.HAuthenticator");
/*
 * instantiating global objects 
 * 
 */
$log=new Logger();
$mainframe=new MainFrame();

$logAuth=new HAuthenticator();
if(getParam("login_attempt")){

	print "<p align='center' class='error_message'>Incorrect Username or Password</p>";

}
	
if(auth()){
		/*
		 * getting the renderer to render the template 
		 */	
$user=new HUser($_SESSION['SESS_MEMBER_ID']);

		$ren=new Renderer();
		/*
		 * gets the default template 
		 */
		$def_templ=$ren->getDefaultTemplate();
		if($def_templ!=false){
			/*
			 * render the default template 
			 */
			$ren->activateTemplate($def_templ);
			
		}else{
			/*
			 * if no default templates gives the error message
			 */
			die("cannot load the default template");
		}
	
	}else {
		/*
		 * if user hasn't logged in ,show the login form 
		 */
		print "<div id='login-div'>";
		print $logAuth->getLoginForm();	
		print "</div>";
	}

?>
</div>

<?php 
/*
 * display the logger window.this should be disabled after the deployment 
 */
if($log->getLoggerStatus()==true){
	
	print "<div id='logger-div'>";
	print "<p>".$log->printLog()."</p>";
	print "</div>";
}else {
	return false;
}

?>
</body>
</html>
