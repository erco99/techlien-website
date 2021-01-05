<?php
require_once '../boot.php';

$listid = $_POST["id_prod"];
$quantity = $_POST["quantity"];
for($i=0; $i< sizeof($listid); $i++){
  $dbh -> createOrder($listid[$i],   $_SESSION['id'], $quantity[$i]);
  send_orderConfirm($listid[$i], $quantity[$i]);
  $dbh -> dropToCart($listid[$i], $_SESSION['id']);

  send_stockWarning($listid[$i]);
}


echo "<p>I tuoi ordini sono stati accettati. Controlla la tua email.</p>";
echo "<p>Stai per essere reinderizzato al tuo profilo</p>";
header( "refresh:3;url=/unibowebsite/profile.php?order" );




?>


<?php

//for send email-confirm
function send_orderConfirm($idproduct, $quantity){

  require_once('PHPMailer/Exception.php');
  require_once('PHPMailer/PHPMailer.php');
  require_once('PHPMailer/SMTP.php');

  //PHPMailer Object
  $mail = new PHPMailer\PHPMailer\PHPMailer(); //Argument true in constructor enables exceptions
  $mail ->IsSMTP();
  $mail->SMTPAuth = true;
  $mail ->SMTPSecure = 'ssl';
  $mail ->Host = 'smtp.gmail.com';
  $mail ->Port = '465';
  $mail ->Username = 'websiteunibo@gmail.com';
  $mail ->Password = 'WebsiteUnibo00';


  //From email address and name
  $mail->From = "Techlien@staff.com";
  $mail->FromName = "STAFF TECHLIEN";

  //To address and name
  $mail->addAddress($_SESSION["email"], $_SESSION["username"]);

  //Address to which recipient will reply
  //$mail->addReplyTo("reply@yourdomain.com", "Reply");
  require_once("../db/database.php");
  $dbh = new DatabaseHelper();

  $orderlist = $dbh -> getProductFromId($idproduct);
  foreach($orderlist as $order){
    $mail->Subject = "Confirm Order Techlien";
    $mail->Body = '
    <html>
    <body>
    <p>Caro '.$_SESSION["username"].'</p>
    <p> Il tuo ordine <br/></p>
    <hr></hr>
    <h2>'.$order["name"].'</h2>
    <h3>'.$order["description"].'</h3>
    <h4><br>Totale: '.$order["price"] * $quantity.' €</br></h4>
    <p style="color:green;"> è stato accettato</p>
    <hr></hr>
    </body>
    </html>';
    $mail->AltBody = "Conferma ordine dal sito TECHLIEN.com";
  }

  //Send HTML or Plain Text email
  $mail->isHTML(true);

  try {
    $mail->send();
  } catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
}




//for send email-warning for stock product
function send_stockWarning($idproduct){

  require_once('PHPMailer/Exception.php');
  require_once('PHPMailer/PHPMailer.php');
  require_once('PHPMailer/SMTP.php');


  require_once("../db/database.php");
  $dbh = new DatabaseHelper();

  $productlist = $dbh -> getProductFromId($idproduct);
  foreach($productlist as $product){

    if($product["stock"] <= 5){
      $userlist = $dbh -> getUserFromId($product["iduser"]);
      foreach($userlist as $user){
        //PHPMailer Object
        $mail = new PHPMailer\PHPMailer\PHPMailer(); //Argument true in constructor enables exceptions
        $mail ->IsSMTP();
        $mail->SMTPAuth = true;
        $mail ->SMTPSecure = 'ssl';
        $mail ->Host = 'smtp.gmail.com';
        $mail ->Port = '465';
        $mail ->Username = 'websiteunibo@gmail.com';
        $mail ->Password = 'WebsiteUnibo00';

        $mail->addAddress($user["email"], $user["username"]);


        //From email address and name
        $mail->From = "Techlien@staff.com";
        $mail->FromName = "STAFF TECHLIEN";

        $mail->Subject = "Info Stock Techlien - Product ";
        $mail->Body = '
        <html>
        <body>
        <p>Ciao '.$user["username"].'</p>
        <p> Il tuo prodotto che hai messo in vendita <br/></p>
        <hr></hr>
        <h2>'.$product["name"].'</h2>
        <h3>'.$product["description"].'</h3>
        <p style="color:yellow; background-color:grey;"> Sta per terminare la disponibilità.<br/> Pezzi rimanenti: '.$product["stock"].'</p>
        <a href="http://localhost/unibowebsite/profile.php#myproduct_'.$product["id"].'" >Clicca qui per aggiornare la disponibilità.</a>
        <hr></hr>
        </body>
        </html>';
        $mail->AltBody = "Conferma ordine dal sito TECHLIEN.com";


        //Send HTML or Plain Text email
        $mail->isHTML(true);

        try {
          $mail->send();
        } catch (Exception $e) {
          echo "Mailer Error: " . $mail->ErrorInfo;
        }
      }
    }
    else{
      echo "CIAOO";
    }
  }
}
?>
