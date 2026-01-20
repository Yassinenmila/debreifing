<?php
namespace App\controller;
use App\core\Controller;
use App\services\Adminservice;

class Adminadduser extends Controller {

    private Adminservice $admin;

    public function index(){
        if($_SERVER['REQUEST_METHOD'] ==="POST"){

            $this->admin=new AdminService();

            $result=$this->admin->add_user(
                $_POST['nom'] ?? '',
                $_POST['prenom'] ?? '',
                $_POST['age'] ?? '',
                $_POST['email'] ?? '',
                $_POST['password'] ?? '',
                $_POST['confirm'] ?? '',
                $_POST['role'] ?? ''

            );
            if(!$result){
                $message="<p class='text-red-600'>there is a problem in your form !!!</p>";
                $this->view('pages.admin.adduser',[
                    'message'=>$message
                ]);
                exit;
            }
            $message="<p class='text-green-600'>Utilisateur ajouter avec succes !!!!</p>";
            $this->view('pages.admin.adduser',[
                'message'=>$message
            ]);
        }
        
        $this->view('pages.admin.adduser');
    }
}