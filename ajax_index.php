<?php
require_once 'includes/call.php';

hImport("core.Logger");
$objectURI=getParam("obj_uri");
$log=new Logger();
$log->ajaxLog("manoj", $objectURI);



?>

	