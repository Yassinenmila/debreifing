<?php
namespace App\controller;
use App\core\Controller;
use App\services\Sprintcompservice;

class Adminviewsprintcomp extends Controller {

    private Sprintcompservice $sprintcomp;
    
    public function index(){
        $this->sprintcomp=new Sprintcompservice();

        $sprint_id=$_POST['sprint_id'] ?? '';

        if(empty($sprint_id)){
            header("Location:/admin/sprintcomp");
            exit;
        }

        $sprint=$this->sprintcomp->getAll_sprints();
        $sprint_data=null;
        foreach($sprint as $s){
            if($s['id'] == $sprint_id){
                $sprint_data=$s;
                break;
            }
        }

        $comps=$this->sprintcomp->get_comp_by_sprint($sprint_id);
        $available_comps=$this->sprintcomp->get_available_comps($sprint_id);

        $this->view("pages.admin.view_sprint_comp",[
            "sprint"=>$sprint_data,
            "comps"=>$comps ? $comps : [],
            "available_comps"=>$available_comps
        ]);
    }
}
