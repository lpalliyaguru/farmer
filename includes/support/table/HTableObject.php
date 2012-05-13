<?php

class HTableObject{
	
	private $type;
	private $image;
	private $link;
	private $input;
	private $select;
	private $radio;
	
	public function HTableObject($type){
		$this->type=$type;
		
		
	}
	public  function addImage($img){
		$this->image=$img;
		
	}
	public  function addLink($lnk){
		$this->link=$lnk;
		
	}
	public  function addInput($inpt){
		$this->input=$inpt;
		
	}
	public  function addSelect($sel){
		$this->select=$sel;
		
	}
	public  function addRadio($radio){
		$this->radio=$radio;
		
	}
	/* getters */
	public  function getType(){
		return $this->type;
		
	}
	public  function getImage(){
		return $this->image;
		
	}
	public  function getLink(){
		return $this->link;
		
	}
	public  function getInput(){
		return $this->input;
		
	}
	public  function getSelect(){
		return $this->select;
		
	}
	public  function getRadio(){
		return $this->radio;
		
	}
}



?>