<?php
require_once 'boot.php';

//if it's yet logged
if(isset($_SESSION["id"])){
  header("Location:/unibowebsite/profile.php");
}

if(isset($_GET["logout"])){
  session_destroy();
  header("Location:/unibowebsite/index.php");
}


if(isset($_GET["create_account"])){
  $templateParams["file"] = TEMPLATE_DIR."template_register.php";
}
 else {
    $templateParams["file"] = TEMPLATE_DIR."template_login.php";
}

require 'base.php';
?>
