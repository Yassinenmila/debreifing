<?php
namespace App\controller;
use App\core\Controller;

class Login extends Controller {

    public function index(){
        $this->view('pages.login');
    }
}