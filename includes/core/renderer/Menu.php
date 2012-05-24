<?php
hImport('support.menu.MenuItem');
class Menu {
	private $menu=array();
	private $db;
	private $accessType;
	public function Menu($accessType){
		
		$this->db=new HDatabase();
		$this->db->connect();
		$this->accessType=$accessType;
	}
	
	
	public function getMenu()
	{
	    return $this->menu;
	}

	public function setMenu($al)
	{	
	   $this->db->select("fm_menu","");
	}
	
	public function getTopMenuItems(){
		$topMenus=array();
		$menuItem=new MenuItem();
		$acces=new AcccesType();
		$general=$acces->getAcccessTypeByName("general")->getId();
		$this->db->resetResult();
		$this->db->select("fm_menu","id","parent='0' AND ( accesstype='".$this->accessType."' OR accesstype='$general')");
		$res=$this->db->getResult();
		
		if(isset($res)){
			foreach ($res as $temp){
				array_push($topMenus,$menuItem->getMenuItemById($temp['id']));
				
			}
			return $topMenus;
			
		}else return false;
	}
	
	public function genrerateMenu($topMenu){
		
		
		$m="<ul id='nav' >";
		foreach ($topMenu as $temp){
			$menu=(object)$temp;
			$m.="<li><a href='".$menu->getLink()."' >".$menu->getName()."</a>";
			while($this->getChilds($menu->getId())){
				$childs_level1=$this->getChilds($menu->getId());
				$m.="<ul>";
				foreach ($childs_level1 as $temp_childs){
					$menu=(object)$temp_childs;
					$m.="<li><a href='".$menu->getLink()."' >".$menu->getName()."</a>";
					while ($this->getChilds($menu->getId())){
						$childs_level1=$this->getChilds($menu->getId());
						$m.="<ul>";
						foreach ($childs_level1 as $temp_childs2 ){
							$menu=(object)$temp_childs2;
							$m.="<li><a href='".$menu->getLink()."' >".$menu->getName()."</a></li>";
						}
						$m.="</ul>";
					}
					$m.="</li>";
					
					
				}
				$m.="</ul>";
			}
			$m.="</li>";
		}
		$m.="</ul>";
		
		return $m;
		
		
	}
	public function getChilds($pid){
		$childs=array();
		$menuItem=new MenuItem();
		
		$this->db->resetResult();
		$this->db->select("fm_menu","*","parent='$pid' AND accesstype='".$this->accessType."'");
		$res=$this->db->getResult();
		if(isset($res)){
			foreach ($res as $temp){
				array_push($childs,$menuItem->getMenuItemById($temp['id']));
				
			}
			
			return $childs;
		}else{
			return false;
		}
		
		
		
		
	}
	
	
}



?>