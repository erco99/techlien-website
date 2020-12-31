<?php
require_once 'boot.php';

$number = $dbh->getNumber("product");
if($number <= 8){
    $mostSoldLimit = $number;
} else{
    $mostSoldLimit = 8;
}

if($mostSoldLimit % 2 != 0){
    $odd = 1;
} else{
    $odd = 0;
}

$templateParams["file"] = TEMPLATE_DIR."template_home.php";
$product = $dbh->mostSold($mostSoldLimit);

require 'base.php';
?>