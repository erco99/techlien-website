<script src="utils/login_functions.js"></script>
<?php
define("TEMPLATE_DIR", "./template/");
include("base.php");
if(isset($_GET["create_account"])){
  include(TEMPLATE_DIR."template_register.php");
}
 else {
    include(TEMPLATE_DIR."template_login.php");
}

//require (footer.php)

?>
