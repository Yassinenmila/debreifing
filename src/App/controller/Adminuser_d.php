<?php 
namespace App\controller;
use App\core\Controller;
use App\services\Adminservice;

class Adminuser_d extends Controller {

    private Adminservice $admin;

    public function index(){
    
        $this->admin=new Adminservice();

        $this->admin->delet_user($_POST['id']);
        header("Location:/admin/users");
        exit;
    }
}