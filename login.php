<?php
require_once 'boot.php';

if(isset($_GET["create_account"])){
  $templateParams["file"] = "template/template_register.php";
}
 else {
    $templateParams["file"] = "template/template_login.php";
}

require 'base.php';
?>
