<?php
class DatabaseHelper{
    private $db;

    public function __construct(){
        $this->db = new mysqli("localhost", "root", "", "dbwebsite");
        if($this->db->connect_error){
            die("Connesione fallita al db");
        }
    }

    public function login($email, $password){
        $stmt = $this->db->prepare("SELECT * FROM user where email=? and password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createUser($email, $username, $password){
        $stmt = $this->db->prepare("INSERT INTO `user`(`email`, `username`,`password`)
                                                                          VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $username, $password);
        $stmt->execute();
        $stmt->close();
    }
  }

?>
