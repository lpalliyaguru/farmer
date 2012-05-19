<?php

hImport("core.db.HDatabase");
hImport("core.renderer.Template");

class Renderer {
	
	public function Renderer(){
		
		
		
	}
	public function getDefaultTemplate(){
		
		$db=new HDatabase();
		$db->connect();
		$db->select("fm_templates","*" ,"default_value='1'");
		$res=$db->getResult();
		try{
			if(isset($res)){
				$tmpl=new Template();
				$tmpl->setTmplDefault($res[0]['default']);
				$tmpl->setTmplId($res[0]['id']);
				$tmpl->setTmplName($res[0]['name']);
				return $tmpl;
			}else {
				return false;
			}
			
		}catch (Exception $e){
			die($e->getMessage());
		}
		
	}
	public function activateTemplate(Template $tmpl){
		
		$tmpl_path="templates/";
		$css_path=$tmpl_path.$tmpl->getTmplName()."/css/".$tmpl->getTmplName().".css";
		$tmpl_path.=$tmpl->getTmplName()."/index.php";
	
		include_once $tmpl_path;
		setTitle("home");
		print "<link rel='stylesheet' type='text/css' href='$css_path'/>";
		
	}
	
	
}




?>