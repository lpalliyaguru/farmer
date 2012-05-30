<?php
//defined("HEXEC") or die('Restricted access.');


class HTableBuilder{
	private $cellpad;
	private $cellspace;
	private $border;
	private $rows;
	private $cols;
	private $class;
	private $celldata=array();

	public function HTableBuilder($border=1,$cellpad=0,$cellspace=0){
		$this->border=$border;
		$this->cellpad=$cellpad;
		$this->cellspace=$cellspace;


	}

	public function setLayout($rows,$cols){
		$this->rows=$rows;
		$this->cols=$cols;

	}
	public function setCellData($row,$col,$data){
			$this->celldata[$row][$col]=$data;	

	}
	
	public function getTable(){
		
		return $this;

	}
	public function setCellpadding($pad){
		
		$this->cellpad=$pad;
		
	}
	
	public function setCellSpacing($spacing){
		
		$this->cellspace=$spacing;
		
	}
	
	public function setBorder($b){
		
		$this->border=$b;
		
	}
	public function renderTable(){
	
		$tableStr="<table border='".$this->border."' cellpadding='".$this->cellpad."' cellspacing='".$this->cellspace."'>";
		
		for($i=0;$i<$this->rows;$i++){
			$tableStr.="<tr>";
			for($j=0;$j<$this->cols;$j++){
				$tableStr.="<td>";
				if(isset($this->celldata[$i][$j])){
					/* rendering the content */
					$type=gettype($this->celldata[$i][$j]);
					if($type=="string"){
						$tableStr.=$this->celldata[$i][$j];
					}else if($type=="object"){
						$obj=$this->celldata[$i][$j];
						$objType=$obj->getType();
					
						/* setting the object to render mode */
						switch ($objType){
							case "IMAGE":
								$image=$obj->getImage();
								$tableStr.="<img src='".$image->getSRC() ."' class='".$image->getCLASS()."' id='".$image->getID()."' height='".$image->getHEIGHT() ."' width='".$image->getWIDTH()."' 	 />";
							break;
							case "LINK":
								$link=$obj->getLink();
								$tableStr.="<a href='".$link->getHREF() ."' class='".$link->getCLASS()."' id='".$link->getID()."' />".$link->getLINK()."</a>";
							break;
							case "INPUT":
								$input=$obj->getInput();
								$tableStr.="<input type='".$input->getInputType() ."' class='".$input->getCLASS()."' id='".$input->getID()."'  name='".$input->getNAME()."' value='".$input->getDefaultValue()."'/>";
							break;
							case "SELECT":
								$select=$obj->getSelect();
							
								$options=$select->getOptions();
								
								$tableStr.="<select name='".$select->getNAME()."' id='".$select->getID()."' class='".$select->getCLASS()."'>";
								foreach ($options as $temp){
									$tableStr.="<option value='".$temp['value']."'>";
									$tableStr.=$temp['option'];
									$tableStr.="</option>";
								}
								$tableStr.="<select>";
							break;
							case "RADIO":
								$radio=$obj->getRadio();
								$options=$radio->getOptions();
								foreach ($options as $temp){
									$tableStr.="<label><input type='radio' name='".$radio->getNAME()."' value='".$temp['value']."'/>".$temp['text']."</lable>";
									
									
								}
								
								default:
						}
						
						
						
						
					}
					
				}
				
				$tableStr.="</td>";	
			}
			$tableStr.="<td></td>";
			$tableStr.="</tr>";
		}
		$tableStr.="</table>";
		return  $tableStr;
	}
	public function getLayout(){
		
		return array("rows"=>$this->rows,"cols"=>$this->cols);
	}
	
	public function getCellpadding(){
		
		return $this->cellpad;
		
	}
	
	public function getCellSpacing(){
		
		return $this->cellspace;
		
	}
	
	public function getBorder(){
		
		return $this->border;
		
	}
	
}




?>