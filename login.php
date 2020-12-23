<?php
require_once 'boot.php';

if(isset($_GET["create_account"])){
  $templateParams["file"] = TEMPLATE_DIR."template_register.php";
}
 else {
    $templateParams["file"] = TEMPLATE_DIR."template_login.php";
}

require 'base.php';
?>
