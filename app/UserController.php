<?php
class UserController{
  private $model;
  public $data2;
  public $data = [];

  public function __construct($model){
    $this->model = $model;
  }

  public function getUser($login){
    $this->model->find($login);
  }

  function test_input($data2) {
    $data2 = trim($data2);
    $data2 = stripslashes($data2);
    $data2 = htmlspecialchars($data2);
    return $data2;
  }

  public function newUser(){
    $data = [
      'firstname' => self::test_input($_POST['firstname']),
      'lastname' => self::test_input($_POST['lastname']),
      'login' => self::test_input($_POST['login']),
      'email' => self::test_input($_POST['email']),
      'password' => self::test_input($_POST['password'])
    ];

    return $this->model->create($data);
  }
}
 ?>
