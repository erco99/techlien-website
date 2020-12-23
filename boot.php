<?php
session_start();
define("UPLOAD_DIR", "./upload/");
define("TEMPLATE_DIR", "./template/");
require_once("db/database.php");
$dbh = new DatabaseHelper();
?>