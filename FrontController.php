<?php
class Route{
  public $model;
  public $view;
  public $controller;
  public $tpl;

  public function __construct($model, $view, $controller, $tpl){
    $this->model = $model;
    $this->view = $view;
    $this->controller= $controller;
    $this->tpl = $tpl;
  }
}

class Router{
  private $table = array();

  public function __construct(){
    $this->table[''] = new Route('Model', 'View', 'Controller', '../tpl/all.php');
    $this->table['users'] = new Route('Model', 'View', 'Controller', '../tpl/allusers.php');
  }

  public function getRoute($route){
    $route = strtolower($route);

    if(!isset($this->table[$route])){
      return $this->table[''];
    }

    return $this->table[$route];
  }
}

class FrontController{
  private $controller;
  private $view;
  private $tpl;
  private $db;

  public function __construct(Router $router, $routeName, $action = null, $argument = null){
    $route = $router->getRoute($routeName);
    $modelName = $route->model;
    $viewName = $route->view;
    $controllerName = $route->controller;
    $tpl = $route->tpl;
    $db = new DB;

    $model = new $modelName($db);
    $this->controller = new $controllerName($model);
    $this->view = new $viewName($model, $tpl);

    if(!empty($action) || !empty($argument)){
      $this->controller->{$action}("$argument");
    }
  }

  public function output(){
    return $this->view->output();
  }
}


 ?>
