<?php
namespace App\model;

class User {
    
    public function __construct(private int $id,private string $nom,private string $prenom,private int $age,private string $email,private string $password,private string $role){}

    public function getid(){
        return $this->id;
    }
    public function getnom(){
        return $this->nom;
    }
    public function getprenom(){
        return $this->prenom;
    }
    public function getage(){
        return $this->age;
    }
    public function getemail(){
        return $this->email;
    }
    public function getpassword(){
        return $this->password;
    }
    public function getrole(){
        return $this->role;
    }
    
}