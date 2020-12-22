<script src="utils/login_functions.js"></script>
<?php
include("base.php");
if(isset($_GET["create_account"])){
  include("template_register.php");
}
 else {
    include("template_login.php");
}

//require (footer.php)

?>
