<?php 
namespace App\services;
use App\repository\Sprintcomprepo;
use App\repository\Adminrepo;
use App\repository\Comprepo;

class Sprintcompservice {

    private Sprintcomprepo $sprintcomp;
    private Adminrepo $admin;
    private Comprepo $comp;

    public function __construct(){
        $this->sprintcomp=new Sprintcomprepo();
        $this->admin=new Adminrepo();
        $this->comp=new Comprepo();
    }

    public function assign_comp($sprint_id, $comp_id){
        if(empty($sprint_id) || empty($comp_id)){
            return false;
        }

        // Vérifier que le sprint existe
        $sprint=$this->admin->get_sprint_by_id($sprint_id);
        if(!$sprint){
            return false;
        }

        // Vérifier que la compétence existe
        $comp=$this->comp->get_comp($comp_id);
        if(!$comp){
            return false;
        }

        return $this->sprintcomp->assign_comp_to_sprint($sprint_id, $comp_id);
    }

    public function get_comp_by_sprint($sprint_id){
        if(empty($sprint_id)){
            return false;
        }
        return $this->sprintcomp->get_comp_by_sprint($sprint_id);
    }

    public function get_all_sprints_with_comps(){
        return $this->sprintcomp->get_all_sprints_with_comps();
    }

    public function remove_comp($sprint_id, $comp_id){
        if(empty($sprint_id) || empty($comp_id)){
            return false;
        }
        return $this->sprintcomp->remove_comp_from_sprint($sprint_id, $comp_id);
    }

    public function get_available_comps($sprint_id){
        if(empty($sprint_id)){
            return [];
        }
        return $this->sprintcomp->get_available_comps($sprint_id);
    }

    public function getAll_sprints(){
        return $this->admin->get_sprint();
    }

    public function getAll_comp(){
        return $this->comp->getAll_comp();
    }
}
