<?php 
namespace App\repository;
use App\core\Data;
use PDO;

class Comprepo {

    private PDO $db;

    public function __construct(){
        $this->db=Data::getinstance()->connect();
    }

    public function getAll_comp(){
        
        try{    
            $stmt=$this->db->prepare("SELECT * FROM competence ORDER BY id DESC");
            $stmt->execute();
            $comp=$stmt->fetchAll();
            if(!$comp){
                return false;
            }
            return $comp;

        }catch(PDOException $e){
            return false;
        }
    }

    public function get_comp($id){
        try{
            $stmt=$this->db->prepare("SELECT * FROM competence WHERE id = :id");
            $stmt->execute([
                ":id"=>$id
            ]);
            $comp=$stmt->fetch();
            if(!$comp){
                return false;
            }
            return $comp;
        }catch(PDOException $e){
            return false;
        }
    }

    public function creat_comp($code, $label, $niveau){
        try{
            $stmt=$this->db->prepare("INSERT INTO competence (code, label, niveau) VALUES (:code, :label, :niveau)");
            $stmt->execute([
                ":code"=>$code,
                ":label"=>$label,
                ":niveau"=>$niveau
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function update_comp($id, $code, $label, $niveau){
        try{
            $stmt=$this->db->prepare("UPDATE competence SET code=:code, label=:label, niveau=:niveau WHERE id=:id");
            return $stmt->execute([
                ":code"=>$code,
                ":label"=>$label,
                ":niveau"=>$niveau,
                ":id"=>$id
            ]);
        }catch(PDOException $e){
            return false;
        }
    }

    public function delet_comp($id){
        try{
            $stmt=$this->db->prepare("DELETE FROM competence WHERE id=:id");
            return $stmt->execute([
                ":id"=>$id
            ]);
        }catch(PDOException $e){
            return false;
        }
    }
}