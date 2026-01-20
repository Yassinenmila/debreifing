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

    public function get_users(){

        $stmt=$this->db->prepare("SELECT id,nom,prenom,age,email,roles FROM users");
        $stmt->execute();

        $users=$stmt->fetchAll();

        if(!$users){
            return false;
        }
        return $users;

    }
}