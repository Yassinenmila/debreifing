<?php 

namespace App\services;

use App\repository\Authrepo;

class Authservice {

    private Authrepo $auth;

    public function __construct(){
        $this->auth= new Authrepo();
    }

    public function login($email,$passwd){
        if(empty($email) || empty($passwd)){
            return false;
        }

        $user= $this->auth->find_email($email);

        if(!$user){
            return false;
        }
    
        if(!password_verify($passwd,$user->getpassword())){
            return false;
        }
        
        $_SESSION['user']=[
            'id'=>$user->getid(),
            'nom'=>$user->getnom(),
            'prenom'=>$user->getprenom(),
            'age'=>$user->getage(),
            'email'=>$user->getemail(),
            'role'=>$user->getrole()
        ];
        return true;
    }
}