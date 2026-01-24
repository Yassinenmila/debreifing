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
    $router->post("/admin/addsprint","Adminaddsprint@index");
    $router->post("/admin/sprintedit","Adminsprintedit@index");
    $router->post("/admin/sprintdelete","Adminsprintdelete@index");
    $router->post("/admin/user","Adminuser@index");
    $router->post("/admin/user_d","Adminuser_d@index");
    $router->get("/logout","Logout@index");
    $router->get("/admin/competence","Admincomp@index");
    $router->post("/admin/addcomp","Adminaddcomp@index");
    $router->post("/admin/compedit","Admincompedit@index");
    $router->post("/admin/compdelete","Admincompdelete@index");
    $router->get("/admin/sprintcomp","Adminsprintcomp@index");
    $router->post("/admin/assigncomp","Adminassigncomp@index");
    $router->post("/admin/removecomp","Adminremovecomp@index");
    $router->post("/admin/viewsprintcomp","Adminviewsprintcomp@index");
}

$router->dispatch();

