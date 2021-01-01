<?php
class DatabaseHelper{

  private $db;
  private $salt = 45;

  public function __construct(){
    //$this->db = new mysqli("db4free.net", "bububu1234", "332bd625", "websiteunibo");
  //  $this->db = new mysqli("localhost", "root", "maria123erco123forl123##@@", "dbwebsite");
    $this->db = new mysqli("localhost", "root", "", "dbwebsite");

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
    $stmt = $this->db->prepare("SELECT * FROM `user` where email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_row($result);
    $stmt->close();

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

  public function addToCart($idproduct, $idusercart, $quantity){
    $stmt = $this->db->prepare("INSERT INTO `cart` (`idproduct`, `iduser`,`quantity`) VALUES (?,?,?)");
    $stmt->bind_param("iii", $idproduct, $idusercart, $quantity);
    $stmt->execute();
    $stmt->close();
  }


  public function dropToCart($idproduct, $idusercart){
    $stmt = $this->db->prepare("DELETE FROM `cart` WHERE idproduct = ? AND iduser = ?");
    $stmt->bind_param("ii", $idproduct, $idusercart);
    $stmt->execute();
    $stmt->close();
  }

  public function createOrder($idProduct, $idUser, $quantity){
    $stmt = $this->db->prepare("INSERT INTO `orders` (`idproduct`, `idbuyer`,`quantity`) VALUES (?,?,?)");
    $stmt->bind_param("iii", $idProduct, $idUser, $quantity);
    $stmt->execute();
    $stmt->close();

    //change quantity in stock of product
    $stmt = $this->db->prepare("UPDATE `product` SET stock=stock-? WHERE id= ?");
    $stmt->bind_param("ii", $quantity, $idProduct);
    $stmt->execute();
    $stmt->close();


  }

  public function getOrders($idUser){
    $stmt = $this->db->prepare("SELECT DISTINCT p.*, o.idproduct, o.idbuyer, o.quantity, o.orderdate, o.tracknumber, u.username as uservendor FROM product p, orders o, user u where o.idbuyer = ? and o.idproduct = p.id and u.id = p.iduser");
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getSelledProduct($idUser){
    $stmt = $this->db->prepare("SELECT DISTINCT p.* FROM product p where p.iduser = ?");
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
  }


  public function mostSold($limit){
    $stmt = $this->db->prepare("SELECT urlimage, name, price, id, iduser FROM product ORDER BY sold DESC limit ?");
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $result->fetch_all(MYSQLI_ASSOC);

    $i = 0;
    foreach ($result as $product){
      $id = $product["id"];
      $idseller = $product["iduser"];
      $urlimage = $product["urlimage"];
      $name = $product["name"];
      $price = $product["price"];
      $array_product[$i] = array("id" => "$id","idseller" => "$idseller", "urlimage" => "$urlimage","name" => "$name", "price" => "$price");
      $i++;
    }

  return $array_product;
  }

  public function createProduct($name, $description, $price, $stock, $iduser, $idcategory, $urlimage){
    $stmt = $this->db->prepare("INSERT INTO `product`(`name`, `description`, `price`, `stock`, `iduser`, `idcategory`, `urlimage`)
    VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiiis", $name, $description, $price, $stock, $iduser, $idcategory, $urlimage);
    $stmt->execute();
    $stmt->close();

  }

  public function removeProduct($id){
    $stmt = $this->db->prepare("DELETE FROM `product` where id= ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

  }

  public function getProductFromId($id){
    $stmt = $this->db->prepare("SELECT * FROM product where id= ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
  }

  public function getProductByCat($idMacro, $idCat){
    $stmt = $this->db->prepare("SELECT p.id, p.name, p.price, p.urlimage
      FROM product p, category c, macrocategory m
      WHERE p.idcategory = ? and
      p.idcategory = c.id and
      c.idmacro = m.id and
      m.id = ?");

    $stmt->bind_param("ii", $idCat, $idMacro);
    $stmt->execute();

    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);

    $i = 0;
    foreach ($result as $product){
      $id = $product["id"];
      $idseller = $product["iduser"];
      $urlimage = $product["urlimage"];
      $name = $product["name"];
      $price = $product["price"];
      $array_product[$i] = array("id" => "$id","idseller" => "$idseller", "urlimage" => "$urlimage","name" => "$name", "price" => "$price");
      $i++;
    }

  return $array_product;
  }

  public function getAllProducts(){
    $stmt = $this->db->prepare("SELECT id, iduser, name, price, urlimage FROM product");
    $stmt->execute();

    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);

    $i = 0;
    foreach ($result as $product){
      $id = $product["id"];
      $idseller = $product["iduser"];
      $urlimage = $product["urlimage"];
      $name = $product["name"];
      $price = $product["price"];
      $array_product[$i] = array("id" => "$id","idseller" => "$idseller","urlimage" => "$urlimage","name" => "$name", "price" => "$price");
      $i++;
    }

  return $array_product;
  }

  public function updateProduct($id, $name, $description, $price, $stock){

    $stmt = $this->db->prepare("UPDATE `product` SET name=?, description=?, price=?, stock=? WHERE id= ?");
    $stmt->bind_param("ssdii", $name, $description, $price, $stock, $id);

    $stmt->execute();
    $stmt->close();
  }


  ////CATEGORY SIDE/////


  public function getCategories(){
    $stmt = $this->db->prepare("SELECT * FROM category");
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);

    return $result;
  }


  public function getMacrocategories(){
    $stmt = $this->db->prepare("SELECT * FROM macrocategory");
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);

    return $result;
  }

  public function getCategoriesByMacro($idMacro){
    $stmt = $this->db->prepare("SELECT * FROM category WHERE idMacro = ?");
    $stmt->bind_param("i", $idMacro);
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);

    return $result;
  }

  //USEFUL FUNCTIONS
  public function getNumber($tableName){
    $stmt = $this->db->prepare("SELECT COUNT(*) as num FROM product");
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);

    foreach($result as $r){
      $num = $r["num"];
    }
     return $num;
  }

  public function getNumberByCat($macrocategory, $category){
    $stmt = $this->db->prepare("SELECT COUNT(*) as num FROM product p, category c, macrocategory m
    WHERE p.idcategory = ? and
    p.idcategory = c.id and
    c.idmacro = m.id and
    m.id = ?");
    $stmt->bind_param("ss", $category, $macrocategory);
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);

    foreach($result as $r){
      $num = $r["num"];
    }
     return $num;
  }
}
?>
