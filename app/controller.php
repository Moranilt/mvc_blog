<?php
class Controller{
  private $model;
  public $data = [];

  public function __construct($model){
    $this->model = $model;
  }

  public function searchName($criteria){
    $this->model->filterName($criteria);
  }

  public function users(){
    $this->model->getAllUsers();
  }

  public function getUser($id){
    $this->model->find($id);
  }

  public function newUser(){
    $data = [
      'firstname' => $_POST['firstname'],
      'lastname' => $_POST['lastname'],
      'login' => $_POST['login'],
      'email' => $_POST['email'],
      'password' => $_POST['password']
    ];

    return $this->model->create($data);
  }
}
 ?>