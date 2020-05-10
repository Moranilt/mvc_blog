<?php
session_start();
// Определяем место где лежат файлы классов, которые будем загружать
define('APP',  '..\\app');
spl_autoload_register(function ($class) {
    require APP. '/'.$class.'.php';
});
require '../FrontController.php';
require '../config.php';

$pdo = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_SCHEMA, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

function setLink($routeName, $actionName = null, $argName = null){
  $link = "index.php?route={$routeName}&action={$actionName}&argument={$argName}";
  return $link;
}

$route = $_GET['route'] ?? '';
$action = $_GET['action'] ?? null;
$arg = $_GET['argument'] ?? null;

$frontController = new FrontController($pdo, new Router, $route, $action, $arg);
return $frontController->output();
 ?>
