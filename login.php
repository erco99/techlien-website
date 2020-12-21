<?php
//require (base.php)
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="utils/login_functions.js"></script>
<?php
if(isset($_GET["create_account"])){
  include("template_register.php");
} else {
    include("template_login.php");
  }

//require (footer.php)

 ?>
