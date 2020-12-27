<?php
require_once("../boot.php");

//UPLOAD image
//TODO mkdir permission denied. Resolve!!!
    //create dir of the user for upload and profile photo
    echo UPLOAD_DIR.$_SESSION["id"];
    if(isset($_FILES["fileToUpload"]["name"])){
        if(!is_dir(UPLOAD_DIR.$_SESSION["id"])){
            mkdir(UPLOAD_DIR.$_SESSION["id"], 0777, true);
            echo "CREATE";
        }
        mkdir("/unibowebsite/img/UPLOAD/8/", 0777, true);

$target_dir = UPLOAD_DIR.$_SESSION["id"]."/";
$target_file = $target_dir. basename($_FILES["fileToUpload"]["name"]);
//echo $target_file;


    }

//$dbh -> createProduct($_POST["nameProduct"], $_POST["descriptionProduct"], $_POST["PriceProduct"],
    //                        $_POST["stockProduct"], $_SESSION["id"], $_POST["nameProduct"], $urlimage);




 ?>
