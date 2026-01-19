<?php 
namespace App\controller;
use App\core\Controller;

class Home extends Controller {

    public function index(){
        $this->view('pages.home');
    }
}