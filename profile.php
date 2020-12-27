<?php
require_once 'boot.php';

if(isset($_SESSION['username'])){
  $templateParams["file"] = TEMPLATE_DIR."template_profile.php";
}
else{
  header("Location:/unibowebsite/login.php");
}
require 'base.php';
?>
