<?php
namespace App\repository;

use App\core\Data;
use App\model\User;
use PDO;

class Authrepo {

    private PDO $db;

    public function __construct(){
        $this->db= Data::getinstance()->connect();
    }

    public function find_email($email){
        
        $stmt=$this->db->prepare("SELECT * FROM users WHERE email=:email ");
        $stmt->execute([
            ":email"=>$email
        ]);

        $user=$stmt->fetch();
        if(empty($user)){
            return false;
        }
        
        return new User(
            $user['id'],
            $user['nom'],
            $user['prenom'],
            $user['age'],
            $user['email'],
            $user['passwd'],
            $user['roles']
        );

    }
}