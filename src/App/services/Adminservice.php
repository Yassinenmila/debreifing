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
    
    public function add_sprint($nom,$date_debut,$date_fin){

        if(empty($nom) || empty($date_debut) || empty($date_fin)){
            return false;
        }
        if(strtotime($date_debut)>=strtotime($date_fin)){
            return false;
        }

        return $this->admin->creat_sprint($nom,$date_debut,$date_fin);
    }

    public function getAll_users(){
        $users=$this->admin->get_users();
        if(!$users){
            return false;
        }
        return $users;
    }

    public function getAll_sprints(){
        $sprints=$this->admin->get_sprint();
        if(!$sprints){
            return false;
        }
        return $sprints;
    }

    public function get_sprint($id){
        $sprint=$this->admin->get_sprint_by_id($id);
        if(!$sprint){
            return false;
        }
        return $sprint;
    }

    public function update_sprint($id, $nom, $date_debut, $date_fin){
        if(empty($id) || empty($nom) || empty($date_debut) || empty($date_fin)){
            return false;
        }
        if(strtotime($date_debut) >= strtotime($date_fin)){
            return false;
        }
        return $this->admin->update_sprint($id, $nom, $date_debut, $date_fin);
    }

    public function delet_sprint($id){
        if(empty($id)){
            return false;
        }
        return $this->admin->delet_sprint($id);
    }
    public function get_user($id){
        $user=$this->admin->get_user($id);
        if(!$user){
            return false;
        }
        return $user;
    }
    public function delet_user($id){

       return $this->admin->delet_user($id);
    }

    public function update_user($id,$nom,$prenom,$age,$email,$passwd,$conf,$role){
        if (empty($nom) || empty($prenom) || empty($age) || empty($email) || empty($passwd) || empty($conf) || empty($role)){
            return false ;
        }

        if($passwd !== $conf){
            return false;
        }

        return $this->admin->update_user(
            $id,
            $nom,
            $prenom,
            $age,
            $email,
            $passwd,
            $role
        );
    }
}