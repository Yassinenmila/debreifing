<?php
session_start();

require __DIR__."/../vendor/autoload.php";

use App\core\Router;

$router = new Router();

$router->get("/","Home@index");
$router->get("/home","Home@index");
$router->get("/login","Login@index");

$router->dispatch();

