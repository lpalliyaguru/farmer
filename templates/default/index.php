<?php 
	defined("HEXEC") or die("Denied access.");
	setTitle("Home");
?>
<link rel="stylesheet" type="text/css" href="templates/default/css/menu_new.css"/>
<script type="text/javascript" src="templates/default/js/scripts.js"></script> 

<script type="text/javascript" >
$(document).ready(function(){
		$('#default-header-profile').click(function(){
			$("#default-header-profile-more").slideToggle('slow');
				event.stopPropagation();
			});
		$('div:not(#default-header-profile)').click(function(){
			
			//$("#default-header-profile-more").slideUp('slow');
			});
		
	//changing bg
		$('#changeBg').click(function(){
				$('#default-change-bg').slideDown('slow');
			});
	
});

function changeBackground(name){
			v=name.split('_');
		$('body').css('background',"url(images/backgrounds/"+v[0]+".jpg) fixed center no-repeat");
		$.cookie('bg', v[0],{ expires: 14});
		
		$('#default-change-bg').slideUp('slow');
}

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
<p id="changeBg" >Change Background</p>
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
<div id="default-change-bg">
	<ul>
	<li><img src="images/backgrounds/thumbs/1_thumb.jpg" name="1_thumb.jpg" onclick="changeBackground(this.name)"></li>
	<li><img src="images/backgrounds/thumbs/2_thumb.jpg" name="2_thumb.jpg" onclick="changeBackground(this.name)"></li>
	<li><img src="images/backgrounds/thumbs/3_thumb.jpg" name="3_thumb.jpg" onclick="changeBackground(this.name)"></li>
	<li><img src="images/backgrounds/thumbs/4_thumb.jpg" name="4_thumb.jpg" onclick="changeBackground(this.name)"></li>
	<li><img src="images/backgrounds/thumbs/5_thumb.jpg" name="5_thumb.jpg" onclick="changeBackground(this.name)"></li>
	<li><img src="images/backgrounds/thumbs/6_thumb.jpg" name="6_thumb.jpg" onclick="changeBackground(this.name)"></li>
	<li><img src="images/backgrounds/thumbs/7_thumb.jpg" name="7_thumb.jpg" onclick="changeBackground(this.name)"></li>
	<li><img src="images/backgrounds/thumbs/8_thumb.jpg" name="8_thumb.jpg" onclick="changeBackground(this.name)"></li>
	<li><img src="images/backgrounds/thumbs/9_thumb.jpg" name="9_thumb.jpg" onclick="changeBackground(this.name)"></li>
	<li><img src="images/backgrounds/thumbs/10_thumb.jpg" name="10_thumb.jpg" onclick="changeBackground(this.name)"></li>
	</ul>


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
