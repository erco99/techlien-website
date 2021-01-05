<?php
require_once("db/database.php");

require_once 'boot.php';

//for change password
if(isset($_GET["email"]) && isset($_GET["recovery"])){
  $userlist = $dbh -> getUserFromEmail($_GET["email"]);
  foreach($userlist as $user){

    echo '<form action="utils/user_credential.php" method="POST">
    <div class="form-group centered">
    <div>
    <input type="hidden" value="1" name="recovery_pass" />
    <input type="hidden" value="'.$_GET["email"].'" name="email" />

    </div>
    <div class="col-sm-12 form-text">
    <label for="inputPassword">New Password:</label>
    <input type="password" class="form-control" name="password" id="inputPassword" aria-describedby="PasswordHelp" />
    <small id="passwordHelp" class="form-text text-muted"></small>
    </div>
    <div>
    <button >Change</button>
    </div>
    </div>';

  }
}
//form for send password recovery
else{
  echo '
  <div class="container">
    <div class="row">
      <div class="box">
        <div class="col-lg-12 form-title">
          <h2>- Recovery password -</h2>
        </div>
        <div>
          <form method="GET">
          <div class="form-group centered">
          <div class="col-sm-12 form-text">
          <label for="inputEmail">Email: </label>
          <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="EmailHelp" />
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div col-sm-12>
          <button >Send</button>
        </div>
      </div>
    </div>
  </div>';

}

if(isset($_GET["email"]) && !isset($_GET["recovery"])){
  $userlist = $dbh -> getUserFromEmail($_GET["email"]);
  if(empty($userlist)){
    echo '<p>This email doesn\'t exist</p>';
  }
  else{
    foreach ($userlist as $user) {
      send_passwordReset($user["email"], $user["username"]);
      echo '<p>An email for password recovery just send to '.$user["email"].'</p>';
      header( "refresh:2;url=/unibowebsite/login.php" );
    }
  }



}



//for send password-reset email
function send_passwordReset($email, $username){

  require_once('utils/PHPMailer/Exception.php');
  require_once('utils/PHPMailer/PHPMailer.php');
  require_once('utils/PHPMailer/SMTP.php');

  $token = rand();

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
  $mail->From = "UniboWebsite@email.com";
  $mail->FromName = "STAFF UniboWebsite";

  //To address and name
  $mail->addAddress($email, $username);

  //Address to which recipient will reply
  //$mail->addReplyTo("reply@yourdomain.com", "Reply");


  $mail->Subject = "Recovery password TECHLIEN";
  $mail->Body = '
  <html>
  <body>
  <p>Link for setup your password to TECHLIEN: </p>
  <a href="localhost/unibowebsite/password_recovery.php?email='.$email.'&recovery=true" >Click here to setup a new password.</a>
  </body>
  </html>';
  $mail->AltBody = "Recovery password to TECHLIEN";
  //Send HTML or Plain Text email
  $mail->isHTML(true);

  try {
    $mail->send();

  } catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
}
?>
