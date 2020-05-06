<?php

// Определяем место где лежат файлы классов, которые будем загружать
define('APP',  '..\\app');
spl_autoload_register(function ($class) {
    require APP. '/'.$class.'.php';
});
require '../FrontController.php';
require '../config.php';

$pdo = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_SCHEMA, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

/*
$db = new DB;
$route = $_GET['route'] ?? '';
$action = $_GET['action'] ?? null;
$arg = $_GET['argument'] ?? null;


if($route == 'users'){
  $tpl = "../tpl/allusers.php";
  $model = new Model($db);
  $controller = new Controller($model);
  $view = new View($model, $tpl);
  $controller->{$action}("$arg");

  echo $view->output();
}else if($route == ''){
  $tpl = "../tpl/all.php";
  $model = new Model($db);
  $controller = new Controller($model);
  $view = new View($model, $tpl);

  if(isset($action)){
    $controller->{$action}("$arg");
  }


  echo $view->output();
  return setLink($route);
}

*/
function setLink($routeName, $actionName = null, $argName = null){
  $link = "index.php?route={$routeName}&action={$actionName}&argument={$argName}";
  return $link;
}

$route = $_GET['route'] ?? '';
$action = $_GET['action'] ?? null;
$arg = $_GET['argument'] ?? null;

$frontController = new FrontController(new Router, $route, $action, $arg);
echo $frontController->output();
 ?>
