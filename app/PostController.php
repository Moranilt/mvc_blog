<?php
class PostController{
  private $model;

  public function __construct($model){
    $this->model = $model;
  }

  public function index(){
    $this->model->allPosts();
  }

  public function getPost($id){
    $this->model->show($id);
  }
}

 ?>
