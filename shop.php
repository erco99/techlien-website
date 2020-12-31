<?php
require_once 'boot.php';

$templateParams["file"] = TEMPLATE_DIR."template_shop.php";
$templateParams["macrocategories"] = $dbh->getMacrocategories();

if(isset($_GET["macrocategoryid"]) && isset($_GET["categoryid"])){
    $product = $dbh->getProductByCat($_GET["macrocategoryid"], $_GET["categoryid"]);
    $limit = $dbh->getNumberByCat($_GET["macrocategoryid"], $_GET["categoryid"]);
} else{
    $product = $dbh->getAllProducts();
    $limit = $dbh->getNumber("product");
}

require 'base.php'
?>