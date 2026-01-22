<?php 
namespace App\controller;
use App\core\Controller;
use App\services\Adminservice;

class Adminuser extends Controller {

    private Adminservice $admin;
    
    public function index(){
        $this->admin=new Adminservice(); 

        $user=$this->admin->get_user($_POST['id']);
        
        if(isset($_POST['sub_u']) && $_SERVER['REQUEST_METHOD']==="POST"){

            $result=$this->admin->update_user(
                $_POST['id']?? '',
                $_POST['nom']?? '',
                $_POST['prenom'] ?? '',
                $_POST['age'] ?? '',
                $_POST['email'] ?? '',
                $_POST['password'] ?? '',
                $_POST['confirm'] ?? '',
                $_POST['role'] ?? ''

            );
            if(!$result){
                die("problem !!!!!!!!!!!!!!!!!!!!");
            }
            header("Location:/admin/users");
            exit;

        }

        $this->view("pages.admin.user",[
            "user"=>$user
        ]);
    }
}
