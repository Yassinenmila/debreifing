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
                die("there is a problem in your code !!!!!!!!");
            }
            header("Location:/admin/sprints");
            exit;

        }
        $this->view("pages.admin.addsprint");
    }
}