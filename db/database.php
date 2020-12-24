<?php
class DatabaseHelper{
  private $db;
  private $salt = 45;

  public function __construct(){
    $this->db = new mysqli("db4free.net", "bububu1234", "332bd625", "websiteunibo");
    if($this->db->connect_error){
      die("Connesione fallita al db");
    }
  }


                                                ////USER SIDE////

  public function login($email, $password){
    $stmt = $this->db->prepare("SELECT * FROM user where email=? and password=?");
    $crypt = crypt($password, $this->salt);
    $stmt->bind_param("ss", $email, $crypt);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function createUser($firstName, $lastName, $email, $username, $password, $token){
    $stmt = $this->db->prepare("INSERT INTO `user`(`firstName`, `lastName`, `email`, `username`, `password`, `token`)
    VALUES (?, ?, ?, ?, ?, ?)");
    $crypt = crypt($password, $this->salt);
    $stmt->bind_param("sssssi", $firstName, $lastName, $email, $username, $crypt, $token);
    $stmt->execute();
    $stmt->close();
  }


  public function checkExistingEmail($email){
    $stmt = $this->db->prepare("SELECT * FROM user where email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if(mysqli_fetch_lengths($result) >= 1){
      return true;
    }
    else {
      return false;
    }

  }

  public function checkToken($email, $token){
    $stmt = $this->db->prepare("SELECT * FROM user where email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    foreach($result->fetch_all(MYSQLI_ASSOC) as $user){
      if($user["email"] == $email && $user["token"]== $token){
        $this -> emailConfirmed($email);
        echo "Email " .$email." is confirmed. Welcome" .$user["username"];
        return true;
      }
    }
    return false;
  }

  private function emailConfirmed($email){
    $stmt = $this->db->prepare("UPDATE `user` SET token=0 WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();
  }


                                          ////PRODUCT SIDE/////

  public function getCart($idUser){
    $stmt = $this->db->prepare("SELECT DISTINCT p.*, c.quantity FROM product p, cart c,  user u where c.iduser = ? and c.idproduct = p.id");
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function addToCart($idproduct, $idusercart){
    $stmt = $this->db->prepare("INSERT INTO `cart` (`idproduct`, `iduser`,1) VALUES (?,?)");
    $stmt->bind_param("ii", $idproduct, $idusercart);
    $stmt->execute();
    $stmt->close();
  }


  public function deleteToCart($idproduct, $idusercart){
    $stmt = $this->db->prepare("DELETE FROM `cart` idproduct = ? AND iduser = ?");
    $stmt->bind_param("ii", $idproduct, $idusercart);
    $stmt->execute();
    $stmt->close();
  }





}
?>
