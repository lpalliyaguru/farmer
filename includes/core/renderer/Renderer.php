<?php

hImport("core.db.HDatabase");
hImport("core.renderer.Template");
hImport('core.renderer.Renderer');
hImport('core.renderer.ToolBar');

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
				$tmpl->setTmplDefault($res[0]['default_value']);
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
	
	public function loadToolBar(){
		
		global $mainframe;
		$active=$mainframe->getActivatedComponent();
		$classURL="components/".$active."/toolbar/toolbar.php";
		
		if(file_exists($classURL)){
			require_once($classURL);
			$toolbar=new ComToolBar();
			$toolbar->setElements();
			$toolbar->renderToolBar();
			
			return true;
		}else {
			return false;
		}
		
		
		
	}
	
	
}




?>