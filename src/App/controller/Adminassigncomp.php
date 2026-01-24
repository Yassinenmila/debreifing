<?php
namespace App\controller;
use App\core\Controller;
use App\services\Sprintcompservice;

class Adminassigncomp extends Controller {

    private Sprintcompservice $sprintcomp;
    
    public function index(){
        $this->sprintcomp=new Sprintcompservice();

        $sprint_id=$_POST['sprint_id'] ?? '';
        $comp_id=$_POST['comp_id'] ?? '';

        if(empty($sprint_id) || empty($comp_id)){
            header("Location:/admin/sprintcomp?error=1");
            exit;
        }

        $result=$this->sprintcomp->assign_comp($sprint_id, $comp_id);

        if(!$result){
            header("Location:/admin/sprintcomp?error=2");
            exit;
        }

        header("Location:/admin/sprintcomp?success=1");
        exit;
    }
}
