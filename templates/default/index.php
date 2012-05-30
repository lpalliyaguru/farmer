<?php 
	defined("HEXEC") or die("Denied access.");
	setTitle("Home");
?>
<link rel="stylesheet" type="text/css" href="templates/default/css/menu_new.css"/>
<link rel="stylesheet" type="text/css" href="components/com_farmer/css/farmer.css"/>
<script type="text/javascript" src="templates/default/js/scripts.js"></script> 
<script type="text/javascript" src="components/com_farmer/js/farmer.js"></script>
<script type="text/javascript" >
$(document).ready(function(){
		$('#default-header-profile').click(function(){
			$("#default-header-profile-more").slideToggle('slow');
				event.stopPropagation();
			});
		$('div:not(#default-header-profile)').click(function(){
			
			$("#default-header-profile-more").slideUp('slow');
			});
		
	
	
});


</script> 
<div id="default-wrapper">



<div id="default-header">

<div id="default-header-profile">
<?php global $user;

?>

<img src="images/avatars/<?php print $user->getAvatar();?>" id=""/>
<p class="name"><?php print $user->getFname()." ".$user->getLname()?></p>
<p class="type"><?php print $user->getUserType()?></p>

<div id="default-header-profile-more">

<img src="images/avatars/<?php print $user->getAvatar();?>" id=""/>
<a class="signout" href="logout.php">Sign Out</a>
</div>
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
	print $m;
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
