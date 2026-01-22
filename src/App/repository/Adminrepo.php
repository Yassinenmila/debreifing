<?php
namespace App\repository;

use App\core\Data;
use PDO;

class Adminrepo {

    private PDO $db;

    public function __construct(){
        $this->db=Data::getinstance()->connect();
    }

    public function creat_user($nom,$prenom,$age,$email,$passwd,$role){

        try{
            $stmt=$this->db->prepare("INSERT INTO users (nom,prenom,age,email,passwd,roles) VALUES (:nom,:prenom,:age,:email,:passwd,:roles)");
            $stmt->execute([
                ":nom"=>$nom,
                ":prenom"=>$prenom,
                ":age"=>$age,
                ":email"=>$email,
                ":passwd"=>password_hash($passwd,PASSWORD_DEFAULT),
                ":roles"=>$role
            ]);
            return true;
        }catch (PDOException $e){
            return false;
        }
    }
    public function creat_sprint($nom,$date_debut,$date_fin){
        
        try{
            $stmt=$this->db->prepare("INSERT INTO sprint (nom,date_debut,date_fin) VALUES (:nom,:date_debut,:date_fin)");
            $stmt->execute([
                ":nom"=>$nom,
                ":date_debut"=>$date_debut,
                ":date_fin"=>$date_fin
            ]);
            return true;        
        } catch(PDOException $e){
            return false;
        }
    }

    public function get_users(){

        $stmt=$this->db->prepare("SELECT id,nom,prenom,age,email,roles FROM users");
        $stmt->execute();

        $users=$stmt->fetchAll();

        if(!$users){
            return false;
        }
        return $users;

    }

    public function get_sprint(){

        $stmt=$this->db->prepare("SELECT * from sprint");
        $stmt->execute();

        $sprints=$stmt->fetchAll();
        
        if(!$sprints){
            return false;
        }
        return $sprints;
    }
    public function get_user($id){
        $stmt=$this->db->prepare("SELECT * FROM users WHERE id =:id");
        $stmt->execute([
            ":id"=>$id
        ]);
        $user=$stmt->fetch();
        if(!$user){
            return false;
        }
        return $user;
    }
    public function delet_user($id){
        
        try{
            $stmt=$this->db->prepare("DELETE FROM users WHERE id=:id");
             return $stmt->execute([
                    ":id"=>$id
            ]);
        }catch (PDOException $e){
            return false;
        }
    }

    public function update_user($id,$nom,$prenom,$age,$email,$passwd,$role){
        
        try{
            $stmt=$this->db->prepare("UPDATE users SET nom=:nom , prenom=:prenom , age=:age , email=:email , passwd=:passwd ,roles=:roles WHERE id=:id");
            return $stmt->execute([
                ":nom"=>$nom,
                ":prenom"=>$prenom,
                ":age"=>$age,
                ":email"=>$email,
                ":passwd"=>password_hash($passwd,PASSWORD_DEFAULT),
                ":roles"=>$role,
                ":id"=>$id
            ]);
            
        }catch(PDOException $e) {
            return false;
        }

    }
}