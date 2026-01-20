<?php
namespace App\controller;
use App\core\Controller;

class DashboardAdmin extends Controller {

    public function index(){
        
        $this->view('pages.admin.dashboard');
    }
}