<?php
namespace App\controller;
use App\core\Controller;
use App\services\Compservice;

class Adminaddcomp extends Controller {

    private Compservice $comp;

    public function index(){
        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $this->comp=new Compservice();

            $result=$this->comp->add_comp(
                $_POST['code'] ?? '',
                $_POST['label'] ?? '',
                $_POST['niveau'] ?? ''
            );

            if(!$result){
                $message="<p class='text-red-600 bg-red-50 p-3 rounded mb-4'>Erreur : Vérifiez que tous les champs sont remplis et que le code est unique !</p>";
                $comp=$this->comp->getAll_comp();
                $this->view('pages.admin.competence',[
                    'message'=>$message,
                    'comp'=>$comp
                ]);
                exit;
            }
            
            header("Location:/admin/competence?success=1");
            exit;
        }
        
        header("Location:/admin/competence");
        exit;
    }
}
