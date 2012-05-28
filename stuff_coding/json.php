<?php
require("../includes/system/farmer/Farmer.php");
class Foo {
  const     ERROR_CODE = '404';
  public    $public_ex = 'this is public';
  private   $private_ex = 'this is private!';
  protected $protected_ex = 'this should be protected'; 

  public function getErrorCode() {
    return self::ERROR_CODE;
  }
}

$foo = new Farmer();
$f=$foo->getFarmerByNIC("882569855");

//$foo_json = json_encode($foo);
//echo $foo_json;

?>