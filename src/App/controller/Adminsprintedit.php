<?php
namespace App\controller;
use App\core\Controller;
use App\services\Adminservice;

class Adminsprintedit extends Controller {

    private Adminservice $admin;
    
    public function index(){
        $this->admin=new Adminservice(); 

        $sprint=$this->admin->get_sprint($_POST['id'] ?? '');
        
        if(isset($_POST['sub_u']) && $_SERVER['REQUEST_METHOD']==="POST"){

            $result=$this->admin->update_sprint(
                $_POST['id'] ?? '',
                $_POST['nom'] ?? '',
                $_POST['date_debut'] ?? '',
                $_POST['date_fin'] ?? ''
            );

            if(!$result){
                $message="<p class='text-red-600 bg-red-50 p-3 rounded mb-4'>Erreur : Vérifiez que la date de début est antérieure à la date de fin !</p>";
                $this->view("pages.admin.sprints_edit",[
                    "sprint"=>$sprint,
                    "message"=>$message
                ]);
                exit;
            }

            header("Location:/admin/sprints?success=1");
            exit;
        }

        if(!$sprint){
            header("Location:/admin/sprints");
            exit;
        }

        $this->view("pages.admin.sprints_edit",[
            "sprint"=>$sprint
        ]);
    }
}
