<?php
session_start();
define("UPLOAD_DIR", "./img/UPLOAD/");
define("TEMPLATE_DIR", "./template/");
require_once("db/database.php");
require_once("utils/user.php");
$dbh = new DatabaseHelper();
?>
