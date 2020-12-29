<?php
require_once 'boot.php';

//if product is setted
if(isset($_GET["id"])){
  $templateParams["file"] = TEMPLATE_DIR."template_product.php";
  }
else{
  header("Location:/unibowebsite/home.php");
}

require 'base.php';
?>
