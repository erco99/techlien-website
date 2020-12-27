<?php
class User {
  private $firstName;
  private $lastName;
  private $username;
  private $email;

  public function __construct($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['firstName'] = $user['firstName'];
    $_SESSION['lastName'] = $user['lastName'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
  }
}
?>
