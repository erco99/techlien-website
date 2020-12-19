<?php
//require (base.php)
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
if(isset($_GET["create_account"])){
  include("template_register.php");
}
  else {
    include("template_login.php");
  }

//require (footer.php)

 ?>
