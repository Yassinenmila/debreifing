<?php 
namespace App\core;

class Router {

    private $routes = [];

    public function get($path,$action){
       $this->routes['GET'][$path]=$action; 
    }

    public function post($path,$action){
       $this->routes['POST'][$path]=$action; 
    }

    public function dispatch(){

        $uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $method=$_SERVER['REQUEST_METHOD'];

        if(isset($this->routes[$method][$uri])){
            
            [$ctrl,$methd]=explode('@',$this->routes[$method][$uri]);
            
            $ctrlclass="App\\controller\\".$ctrl;
            
            if(class_exists($ctrlclass) && method_exists($ctrlclass,$methd)){
                $controller=new $ctrlclass();
                $controller->$methd();
                return;
            }else{
                $this->view404();
            }
            
            
        }else{
            $this->view404();
        }
    }

    private function view404(){
        http_response_code(404);

        require_once __DIR__."/../views/pages/404.blade.php";
    }
}