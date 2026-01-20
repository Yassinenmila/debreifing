<?php
namespace App\controller;
use App\core\Controller;
use App\services\Authservice;

class Login extends Controller {

    private Authservice $auth;

    public function index(){
        
        if($_SERVER['REQUEST_METHOD']==="POST"){

            $this->auth=new Authservice();

            $email=$_POST['email'] ?? '';
            $passwd=$_POST['password'] ?? '';

            if($this->auth->login($email,$passwd)){
                header("Location:/home");
                exit;         
            }

            $error = "user not found";

            $this->view('pages.login',[
                'error'=>$error
            ]);
            exit;
        }

        $this->view('pages.login');
    }
}