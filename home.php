<?php
require_once 'boot.php';

$mostSoldLimit = 8;
$templateParams["file"] = TEMPLATE_DIR."template_home.php";
$product = $dbh -> mostSold($mostSoldLimit);

require 'base.php';
?>