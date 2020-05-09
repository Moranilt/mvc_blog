<?php
class UserModel{
  public $db;
  public $user;
  private $data = [];

  public function __construct($db){
    $this->db = $db;
  }

  public function find($login){
    $stmt = $this->db->prepare("SELECT * FROM users WHERE login= :login");
    $stmt->execute(['login' => $login]);
    $this->user = $stmt->fetch();
    return $this->user;
  }

  public function create(array $data){
    $stmt = $this->db->prepare("INSERT INTO users (firstname, lastname, login, email, password) VALUES(:firstname, :lastname, :login, :email, :password)");
    $hashPass = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt->execute([':firstname' => $data['firstname'], ':lastname' => $data['lastname'], ':login' => $data['login'], ':email' => $data['email'], ':password' => $hashPass]);
    $this->user = self::find($data["login"]);
    return $this->user;
  }
}

 ?>
