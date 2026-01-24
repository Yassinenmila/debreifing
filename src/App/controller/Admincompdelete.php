<?php
namespace App\controller;
use App\core\Controller;
use App\services\Compservice;

class Admincompdelete extends Controller {

    private Compservice $comp;

    public function index(){
        $this->comp=new Compservice();

        $result=$this->comp->delet_comp($_POST['id'] ?? '');

        if(!$result){
            header("Location:/admin/competence?error=1");
            exit;
        }

        header("Location:/admin/competence?success=1");
        exit;
    }
}
