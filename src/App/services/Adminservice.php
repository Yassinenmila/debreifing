<?php 
namespace App\services;
use App\repository\Adminrepo;

class Adminservice {

    private Adminrepo $admin;

    public function __construct(){
        $this->admin=new Adminrepo();
    }

    public function add_user($nom,$prenom,$age,$email,$passwd,$conf,$role){

        if (empty($nom) || empty($prenom) || empty($age) || empty($email) || empty($passwd) || empty($conf) || empty($role)){
            return false ;
        }

        if($passwd !== $conf){
            return false;
        }

        return $this->admin->creat_user(
            $nom,
            $prenom,
            $age,
            $email,
            $passwd,
            $role
        );
    }

    public function getAll(){
        $users=$this->admin->get_users();
        if(!$users){
            return false;
        }
        return $users;
    }
}