<?php
namespace App\controller;
use App\core\Controller;
use App\services\Adminservice;

class Adminusers extends Controller {

    private Adminservice $admin;

    public function index(){

        $this->admin=new Adminservice();
        
        $data=$this->admin->getAll();

        $this->view("pages.admin.users",[
            'data'=>$data
        ]);
    }
}