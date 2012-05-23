
<?php

interface Storable {
	function getContentsAsText();
}
 
class Document implements Storable {
	public function getContentsAsText() {
		return "This is Text of the Document\n";
	}
	public function add($n1,$n2){
		return $n1+$n2;
		
	}
}
 
class Indexer {
	public function readAndIndex(Document $s) {
		$textData = $s->getContentsAsText();
		//do necessary logic to index
		echo $textData;
	}
	public function getAdd(Document $d,$m1,$m2){
		
		return $d->add($m1, $m2);
	}
}
 
$p = new Document();
 
$i = new Indexer();
$i->readAndIndex($p);
print $i->getAdd($p, 12, 2);
?>