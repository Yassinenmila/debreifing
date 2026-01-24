<?php 
namespace App\services;
use App\repository\Comprepo;

class Compservice {

    private Comprepo $comp;

    public function __construct(){
        $this->comp=new Comprepo();
    }

    public function getAll_comp(){
        $comp=$this->comp->getAll_comp();
        if(!$comp){
            return false;
        }
        return $comp;
    }

    public function get_comp($id){
        $comp=$this->comp->get_comp($id);
        if(!$comp){
            return false;
        }
        return $comp;
    }

    public function add_comp($code, $label, $niveau){
        if(empty($code) || empty($label) || empty($niveau)){
            return false;
        }

        $valid_niveaux = ['IMITER', 'SADAPTER', 'TRANSPOSER'];
        if(!in_array($niveau, $valid_niveaux)){
            return false;
        }

        return $this->comp->creat_comp($code, $label, $niveau);
    }

    public function update_comp($id, $code, $label, $niveau){
        if(empty($id) || empty($code) || empty($label) || empty($niveau)){
            return false;
        }

        $valid_niveaux = ['IMITER', 'SADAPTER', 'TRANSPOSER'];
        if(!in_array($niveau, $valid_niveaux)){
            return false;
        }

        return $this->comp->update_comp($id, $code, $label, $niveau);
    }

    public function delet_comp($id){
        if(empty($id)){
            return false;
        }
        return $this->comp->delet_comp($id);
    }
}