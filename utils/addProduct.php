<?php
require_once '../boot.php';

if(isset($_POST["update"])){
  $dbh -> updateProduct((int)$_POST["idtext"], $_POST["nametext"], $_POST["descriptiontext"], (float)$_POST["pricetext"], (int)$_POST["stocktext"]);
  header("Location:/unibowebsite/profile.php");

}

else{

  $upload_dir = "../img/UPLOAD/";
  //UPLOAD image
  //TODO mkdir permission denied. Resolve!!!
  //create dir of the user if it's the first upload for upload and profile photo
  if(isset($_FILES["fileToUpload"]["name"])){
    if(!is_dir($upload_dir.$_SESSION["id"])){
      mkdir($upload_dir.$_SESSION["id"], 0777, true);
    }

    $target_dir = $upload_dir.$_SESSION["id"]."/";
    $target_file = $target_dir. basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

  }

  $dbh -> createProduct($_POST["nameProduct"], $_POST["descriptionProduct"], (float)$_POST["priceProduct"],
  (int)$_POST["stockProduct"], $_SESSION["id"], (int)$_POST["categoryProduct"], $_FILES["fileToUpload"]["name"]);


  header("Location:/unibowebsite/profile.php?order");
}
?>
