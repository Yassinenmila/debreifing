<?php 
namespace App\controller;
use App\core\Controller;
use App\services\Adminservice;

class Adminsprint extends Controller {

    private Adminservice $admin;

    public function index(){

        $this->admin=new Adminservice();

        $sprints=$this->admin->getAll_sprints();

        $this->view("pages.admin.sprints",[
            'sprints'=>$sprints
        ]);
    }
}