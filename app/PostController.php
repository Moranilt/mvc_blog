<?php
class PostController{
  private $model;
  public $data = [];
  public $data2;

  public function __construct($model){
    $this->model = $model;
  }

  public function index(){
    $this->model->allPosts();
  }

  public function getPost($id){
    $this->model->show($id);
  }

  function test_input($data2) {
    $data2 = trim($data2);
    $data2 = stripslashes($data2);
    $data2 = htmlspecialchars($data2);
    return $data2;
  }

  public function create(){
    $pdo = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_SCHEMA, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $user = new UserModel($pdo);
    $user_login = $_SESSION['user_login'];
    $user = $user->find($user_login);

      $data = [
        'user_id' => $user['id'],
        'title' => $_POST['title'],
        'body' => $_POST['body']
      ];
      
    return $this->model->store($data);
  }
}
 ?>
