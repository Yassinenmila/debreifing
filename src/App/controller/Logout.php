<?php
namespace App\controller;
use App\core\Controller;

class Logout{
    public function index(){
        session_destroy();
        header('Location:/');
        exit;
    }
}