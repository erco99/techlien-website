<?php
require_once 'boot.php';
$total=0;
$_GLOBAL["idUser"] = 1;
$templateParams["file"] = TEMPLATE_DIR."template_cart.php";
require 'base.php';


function delete(){
	$dbh -> deleteFromCart($product["id"], $_GLOBAL["idUser"]);
	header("Refresh:0");
}
 ?>
