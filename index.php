<?php
require_once 'boot.php';

$number = $dbh->getNumber("product");
if($number <= 8){
    $limit = $number;
} else{
    $limit = 8;
}

$templateParams["file"] = TEMPLATE_DIR."template_home.php";
$product = $dbh->mostSold($limit);

require 'base.php';
?>