<?php

require_once("../db/database.php");
$dbh = new DatabaseHelper();

///// login form called this .php/////
if(isset($_POST["login"])){
  $user = $dbh -> login($_POST["email"], $_POST["password"] );
  if(empty($user)){
    ?>
    <p>Password is incorrect</p>
    <?php
  }
  else{
    foreach($user as $value):
    ?>
    <p>Welcome <?php echo $value["username"] ?></p> </p></p>
    <?php
  endforeach;
  }
}

/////register function/////
else{
  ?>
  <p>Register page</p>
  <?php
}
 ?>
