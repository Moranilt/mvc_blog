<?php
class Auth{
  private $model;
  public $data2;
  public $data = [];

  public function __construct($model){
    $this->model = $model;
  }

  function test_input($data2) {
    $data2 = trim($data2);
    $data2 = stripslashes($data2);
    $data2 = htmlspecialchars($data2);
    return $data2;
  }

  public function login(){
    if(isset($_POST['login']) && isset($_POST['password'])){
      $data = [
        'login' => self::test_input($_POST['login']),
        'password' => self::test_input($_POST['password'])
      ];

      $user = $this->model->find($data['login']);
      if(password_verify($data['password'], $user['password'])){
        session_start();
        $_SESSION['user_login'] = $user['login'];
        $_SESSION['user_id'] = $user['id'];
      }
    }else{
      echo "You should complete the form. Login or Pass is empty.";
    }

  }

  public function logout(){
    unset($_SESSION['user_login']);
    unset($_SESSION['user_id']);
    session_destroy();
  }
}

 ?>
