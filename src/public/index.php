<?php
session_start();

require __DIR__."/../vendor/autoload.php";

use App\core\Router;

$router = new Router();
if (!isset($_SESSION['user'])){
    $router->get("/","Login@index");
    $router->post("/login","Login@index");
} else { 
    $router->get("/","Home@index");
    $router->get("/home","Home@index");
    $router->get("/admin/dashboard","DashboardAdmin@index");
    $router->get("/admin/adduser","Adminadduser@index");
    $router->post("/admin/adduser","Adminadduser@index");
    $router->get("/admin/users","Adminusers@index");
}

$router->dispatch();

