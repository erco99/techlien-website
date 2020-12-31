<?php
require_once 'boot.php';

$number = $dbh->getNumber("product");
if($number <= 8){
    $mostSoldLimit = $number;
} else{
    $mostSoldLimit = 8;
}

$templateParams["file"] = TEMPLATE_DIR."template_home.php";
$product = $dbh->mostSold($mostSoldLimit);

require 'base.php';
?>