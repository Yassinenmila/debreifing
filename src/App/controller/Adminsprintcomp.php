<?php
namespace App\controller;
use App\core\Controller;
use App\services\Sprintcompservice;

class Adminsprintcomp extends Controller {

    private Sprintcompservice $sprintcomp;
    
    public function index(){
        $this->sprintcomp=new Sprintcompservice();

        $sprints=$this->sprintcomp->get_all_sprints_with_comps();

        $this->view("pages.admin.sprint_comp",[
            "sprints"=>$sprints
        ]);
    }
}
