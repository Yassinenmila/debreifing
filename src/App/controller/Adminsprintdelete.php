<?php
namespace App\controller;
use App\core\Controller;
use App\services\Adminservice;

class Adminsprintdelete extends Controller {

    private Adminservice $admin;

    public function index(){
        $this->admin=new Adminservice();

        $result=$this->admin->delet_sprint($_POST['id'] ?? '');

        if(!$result){
            header("Location:/admin/sprints?error=1");
            exit;
        }

        header("Location:/admin/sprints?success=1");
        exit;
    }
}
