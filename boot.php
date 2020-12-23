<?php
session_start();
define("UPLOAD_DIR", "./img/UPLOAD/");
define("TEMPLATE_DIR", "./template/");
require_once("db/database.php");
$dbh = new DatabaseHelper();
?>
