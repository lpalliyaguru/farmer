<?

class image{
	
	/*
	 * this is the implementation of Link class 
	 * @author giya
	 * 
	 */
	
	/* source of the image */
	private $src;
	
	/* href of the image */
	private $href;
	
	/* height of the image */
	private $height;
	
	/* width of the image */
	private $width;
	
	/* class of the image */
	private $class;
	
	/* id of the image */
	private $id;
	
	/* type of the image */
	private $type;
	
	public function image($src,$w,$h){
		$this->src=$src;
		$this->type="IMAGE";
		$this->width=$w;
		$this->height=$h;
	}
	/* setters */
	public function setSRC($src){
		$this->src=$src;
	}
	public function setHREF($href){
		$this->href=$href;
	}
	public function setHEIGHT($height){
			$this->height=$height;
		}
	public function setWIDTH($wdth){
			$this->width=$wdth;
		}
	public function setCLASS($cls){
			$this->class=$cls;
		}
	public function setID($id){
			$this->id=$id;
		}
		/* getters */
	public function getSRC(){
		return 	$this->src;
	}
	public function getHREF(){
		return 	$this->href;
	}
	public function getHEIGHT(){
		return 	$this->height;
		}
	public function getWIDTH(){
			return	$this->width;
		}
	public function getCLASS(){
			return $this->class;
		}
	public function getID(){
			return $this->id;
		}
	public function getType(){
			return $this->type;
		}
}

/* setting the link class */

class Link{
	
	/*
	 * this is the implementation of Link class 
	 * @author giya
	 * 
	 */
	/* href of the link */
	private $href;
	
	/* class of the link */
	private $class;
	
	/* id of the link */
	private $id;
	
	/* type of the link */
	private $type;
	
	/* name of the link */
	private $name;
	
	/* link of the link */
	private $link;
	
	public function Link($href="",$link=""){
		$this->href=$href;
		$this->link=$link;
		$this->type="LINK";
	}
	/* setters */
	
	public function setHREF($href){
		$this->href=$href;
	}
	
	public function setCLASS($cls){
			$this->class=cls;
		}
	public function setID($id){
			$this->id=$id;
		}
	public function setLINK($link){
			$this->link=$link;
		}
	public function setNAME($name){
			$this->link=$name;
		}
		/* getters */

		
	public function getCLASS(){
			return $this->class;
		}
	public function getID(){
			return $this->id;
		}
	public function getHREF(){
			return $this->href;
		}
	public function getType(){
			return $this->type;
		}
	public function getLINK(){
			return $this->link;
		}
	public function getNAME(){
			return $this->name;
		}
}



class Input{
	/*
	 * this is the implementation of Input class 
	 * @author giya
	 * 
	 */
	/* type of input password,hidden etc*/
	private $inputType;
	
	/* class of input */
	private $class;
	
	/* id of input */
	private $id;
	
	/* type of input */
	private $type;
	
	/* name of input */
	private $name;
	
	/* default of input */
	
	private $default;
	
	/* extra optiond of input */
	
	private $extra;
	/*
	 * Constructor sets the name,input type,default value,class and id 
	 */	
	
	public function Input($name,$inputType,$default="",$class="",$id=""){
		$this->name=$name;
		$this->type="INPUT";
		$this->default=$default;
		$this->inputType=$inputType;
		
	}
	/* setting setters */
	
	
	public function setInputType($type){
			$this->inputType=$type;
		}
	public function setCLASS($cls){
			$this->class=cls;
		}
	public function setID($id){
			$this->id=$id;
		}
	public function setNAME($name){
			$this->link=$name;
		}
	public function setDefaultValue($val){
			$this->default=$val;
		}
	public function setExtra($ex){
			$this->extra=$ex;		
	}			
		
		/* setting getters */

		
	public function getInputType(){
			return $this->inputType;
		}
		
	public function getID(){
			return $this->id;
		}
	
	public function getType(){
			return $this->type;
		}
	public function getDefaultValue(){
			return $this->default;
		}
	public function getNAME(){
			return $this->name;
		}
	public function getCLASS(){
			return $this->name;
		}
	public function getExtra(){
			return $this->extra;
	}	
}

/*
 * this is select object implementation 
 * @author giya
 * 
 * 
 * 
 * 
 * */



class Select{
	/* type of the input text,password,file,hidden */
	private $inputType;
	
	/* class of the input */
	private $class;
	
	/* id of the input */
	private $id;
	
	/* type  of the object IMAGE,LINK,SELECT etc */
	private $type;
	
	/* name of the input */
	private $name;
	
	/* default value of the input */
	private $default;
	
	/* options  of the select input */
	private $options;
	
	/*
	 * constructor setting name,type and input type
	 * */
	public function Select($name,$inputType,$class="",$id=""){
		$this->name=$name;
		$this->type="SELECT";
		$this->inputType=$inputType;
		
	}
		/* setting setters */
	
	
	public function setInputType($type){
			$this->inputType=$type;
		}
	public function setCLASS($cls){
			$this->class=cls;
		}
	public function setID($id){
			$this->id=$id;
		}
	public function setNAME($name){
			$this->link=$name;
		}
	public function setDefaultValue($val){
			$this->default=$val;
		}		
	public function setOptions($options){
			$this->options=$options;
		}
		
		/* setting getters */
		
	public function getInputType(){
			return $this->inputType;
		}
		
	public function getID(){
			return $this->id;
		}
	public function getDefaultValue(){
			return $this->default;
		}
	public function getType(){
			return $this->type;
		}
	
	public function getNAME(){
			return $this->name;
		}
	public function getCLASS(){
			return $this->name;
		}
	public function getOptions(){
			return $this->options;
		}
		
		
}

class Radio{
	
	/* class of the input */
	private $class;
	
	/* id of the input */
	private $id;
	
	/* type  of the object IMAGE,LINK,SELECT etc */
	private $type;
	
	/* name of the input */
	private $name;
	
	/* default value of the input */
	private $default;
	
	/* options  of the select input */
	private $options;
	
	/*
	 * constructor setting name,type and input type
	 * */
	public function Radio($name,$inputType,$class="",$id=""){
		$this->name=$name;
		$this->type="RADIO";
		$this->inputType=$inputType;
		
	}
		/* setting setters */
	
	
	public function setInputType($type){
			$this->inputType=$type;
		}
	public function setCLASS($cls){
			$this->class=cls;
		}
	public function setID($id){
			$this->id=$id;
		}
	public function setNAME($name){
			$this->link=$name;
		}
	public function setDefaultValue($val){
			$this->default=$val;
		}		
	public function setOptions($options){
			$this->options=$options;
		}
		
		/* setting getters */
		
	public function getInputType(){
			return $this->inputType;
		}
		
	public function getID(){
			return $this->id;
		}
	public function getDefaultValue(){
			return $this->default;
		}
	public function getType(){
			return $this->type;
		}
	
	public function getNAME(){
			return $this->name;
		}
	public function getCLASS(){
			return $this->name;
		}
	public function getOptions(){
			return $this->options;
		}
		
		
}





?>

