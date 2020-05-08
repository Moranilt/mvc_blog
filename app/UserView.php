<?php
class UserView{
  private $model;
  private $template;

  public function __construct($model, $template){
    $this->model = $model;
    $this->template = $template;
  }

  public function output(){
    require($this->template);
    return $this->model->user;
  }
}
 ?>
