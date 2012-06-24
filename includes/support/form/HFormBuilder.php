<?php

class HFormBuilder{
	
	private $fields;
	private $action;
	private $method;
	private $id;
	private $class;
	private $title;
	private $layout=null;
	private $onsubmit;
	
	public function HFormBuilder($action,$method,$title="",$id="",$class=""){
		$this->action=$action;
		$this->method=$method;
		$this->id=$id;
		$this->class=$class;
		$this->title=$title;
		
	}
	
	public function addFields($flds){
		
		$this->fields=$flds;
		/*
		 * fields 
		 * array(array('label'=>'lebel_content','object'=>$obj)
		 * 		 array('label'=>'lebel_content','object'=>$obj)
		 * 		 array('label'=>'lebel_content','object'=>$obj)
		 * 		);
		 * 
		 */
		
	} 
	
	public function setLayout($layout){
		
		$this->layout=$layout;
		
		
	}
	public function renderForm(){
		/*
		 * rendering the form with fed content
		 */
		if($this->layout){
			switch ($this->layout){
				case DEFAULT_LAYOUT:
				/* render as default layout */
					
					$form="<form action='".$this->action."' method='".$this->method."' 
					id='".$this->id."' class='".$this->class."' onsubmit='return ".$this->onsubmit."'>";
					$form.="<h3>".$this->getTitle()."</h3>";
					/* getting the table  */
					$tblBulider=new HTableBuilder();
					$table=$tblBulider->getTable();
					$table->setBorder(0);
					/*set the table layout */
					$table->setLayout(count($this->fields), 2);
					$i=0;
					foreach ($this->fields as $temp){
						$obj=$temp['object'];
						if($obj){
						//print $obj->getType();
						$table->setCellData($i, 0,$temp['label']);
						$table->setCellData($i, 1,$obj);
						}
						$i++;
						
					}
					
					
					
					$form.=$table->renderTable();
					$form.="</form>";
				break;
				default:
			}
			
			
			return  $form;
			
		}else{
			
			die("Cannot render the form. Please set the layout attribute.");
		}
		
		
	}
	public function setAction($a){
		
		$this->action=$a;
		
		
	}
	public function setMethod($m){
		
		$this->method=$m;
		
		
	}
	public function setId($id){
		
		$this->id=$id;
		
		
	}
	public function setClass($class){
		
		$this->class=$class;
		
		
	}
	public function setTitle($title){
		
		$this->title=$title;
		
		
	}
	public function setOnsubmit($func){
		
		$this->onsubmit=$func;
		
		
	}
	/*
	 * getters
	 */
	public function getLayout(){
		
		return $this->layout;
		
		
	}
	
	public function getAction(){
		
		return $this->action;
		
		
	}
	public function getMethod(){
		
		return $this->method;
		
		
	}
	public function getId(){
		
		return $this->id;
		
		
	}
	public function getClass(){
		
		return $this->class;
		
		
	}
	public function getTitle(){
		
		return $this->title;
		
		
	}
	public function getForm(){
		
		return $this;
		
		
	}
	public function getFields(){
		return $this->fields;
	} 
	
}




?>