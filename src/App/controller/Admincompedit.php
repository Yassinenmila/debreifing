<?php
namespace App\controller;
use App\core\Controller;
use App\services\Compservice;

class Admincompedit extends Controller {

    private Compservice $comp;
    
    public function index(){
        $this->comp=new Compservice(); 

        $comp=$this->comp->get_comp($_POST['id'] ?? '');
        
        if(isset($_POST['sub_u']) && $_SERVER['REQUEST_METHOD']==="POST"){

            $result=$this->comp->update_comp(
                $_POST['id'] ?? '',
                $_POST['code'] ?? '',
                $_POST['label'] ?? '',
                $_POST['niveau'] ?? ''
            );

            if(!$result){
                $message="<p class='text-red-600 bg-red-50 p-3 rounded mb-4'>Erreur lors de la modification !</p>";
                $this->view("pages.admin.competence_edit",[
                    "comp"=>$comp,
                    "message"=>$message
                ]);
                exit;
            }

            header("Location:/admin/competence?success=1");
            exit;
        }

        if(!$comp){
            header("Location:/admin/competence");
            exit;
        }

        $this->view("pages.admin.competence_edit",[
            "comp"=>$comp
        ]);
    }
}
