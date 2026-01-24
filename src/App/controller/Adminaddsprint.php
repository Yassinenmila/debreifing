<?php 
namespace App\controller;
use App\core\Controller;
use App\services\Adminservice;

class Adminaddsprint extends Controller {

    private Adminservice $admin;

    public function index(){
        if($_SERVER['REQUEST_METHOD']==="POST"){
           
            $this->admin=new Adminservice();
            $result=$this->admin->add_sprint($_POST['nom'],$_POST['date_debut'],$_POST['date_fin']);
            if(!$result){
                $message="<p class='text-red-600 bg-red-50 p-3 rounded mb-4'>Erreur : Vérifiez que tous les champs sont remplis et que la date de début est antérieure à la date de fin !</p>";
                $this->view("pages.admin.addsprint",[
                    'message'=>$message
                ]);
                exit;
            }
            header("Location:/admin/sprints?success=1");
            exit;

        }
        $this->view("pages.admin.addsprint");
    }
}