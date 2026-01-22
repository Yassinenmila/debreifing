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
    $router->get("/admin/sprints","Adminsprint@index");
    $router->get("/admin/addsprint","Adminaddsprint@index");
    $router->post("/admin/user","Adminuser@index");
    $router->post("/admin/user_d","Adminuser_d@index");
    $router->get("/logout","Logout@index");
    $router->post("/admin/addsprint","Adminaddsprint@index");
}

$router->dispatch();

