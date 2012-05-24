<?php 
	defined("HEXEC") or die("Denied access.");
	setTitle("Home");
?>
<link rel="stylesheet" type="text/css" href="templates/default/css/menu_new.css"/>
<script type="text/javascript" src="templates/default/js/scripts.js"></script> 
<script type="text/javascript" >
$(document).ready(function(){

	
});


</script> 
<div id="default-wrapper">



<div id="default-header">

<div id="default-header-profile">
<img src="">

</div>

</div>
<div id="default-main-menu">
<?php 
	hImport('core.renderer.Menu');
	hImport('support.login.Access');
	
	$acces=new AcccesType();
	$accessType=$acces->getAcccessTypeByName($_SESSION['SESS_USERTYPE']);
	$menu=new Menu($accessType->getId());
	$topmenu=$menu->getTopMenuItems();
	$m=$menu->genrerateMenu($topmenu);
	print$m;
	?>
	
	
</div>

<div id="default-ribbon-menu">
<?php 

hImport("core.renderer.Renderer");
$renderer=new Renderer();
$renderer->loadToolBar();




?>
</div>


<div id="default-content">
<?php 


	if(getParam("page")){
		$param=getParam("page");
		$p=explode("_", $param);
		$type=$p[0];
		$key=$p[1];
		if($type=="" || $key==""){
			//wrong page call
			print "wrong call";
		}else{
			//page call is correct 
			global $mainframe;
			if($type=="mod"){
				include_once 'modules/mod_'.$key."/".$key.".php";
				
				$mainframe->activateModule($key);
			}else if($type=="com"){
				include_once 'components/com_'.$key."/".$key.".php";
				$mainframe->activateComponent($key);
			}else {
				print "wrong content call";
			}
			
			
		}
		
	}else{
		
		//render the front page
	}


?>



</div>

</div>
