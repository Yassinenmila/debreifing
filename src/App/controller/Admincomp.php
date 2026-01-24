<?php 

namespace App\controller;
use App\core\Controller;
use App\services\Compservice;

class Admincomp extends Controller {

    private Compservice $comp;
    
    public function index(){
        $this->comp=new Compservice();

        $comp=$this->comp->getAll_comp();

        $this->view("pages.admin.competence",[
            "comp"=>$comp
        ]);
    }
}