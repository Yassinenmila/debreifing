<?php 
namespace App\repository;
use App\core\Data;
use PDO;

class Sprintcomprepo {

    private PDO $db;

    public function __construct(){
        $this->db=Data::getinstance()->connect();
    }

    // Assigner une compétence à un sprint
    public function assign_comp_to_sprint($sprint_id, $comp_id){
        try{
            // Vérifier si l'assignation existe déjà
            $check=$this->db->prepare("SELECT id FROM sprint_comp WHERE sprint_id=:sprint_id AND comp_id=:comp_id");
            $check->execute([
                ":sprint_id"=>$sprint_id,
                ":comp_id"=>$comp_id
            ]);
            if($check->fetch()){
                return false; // Déjà assignée
            }

            $stmt=$this->db->prepare("INSERT INTO sprint_comp (sprint_id, comp_id) VALUES (:sprint_id, :comp_id)");
            $stmt->execute([
                ":sprint_id"=>$sprint_id,
                ":comp_id"=>$comp_id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    // Récupérer toutes les compétences d'un sprint
    public function get_comp_by_sprint($sprint_id){
        try{
            $stmt=$this->db->prepare("
                SELECT c.id, c.code, c.label, c.niveau, sc.id as assignation_id
                FROM competence c
                INNER JOIN sprint_comp sc ON c.id = sc.comp_id
                WHERE sc.sprint_id = :sprint_id
                ORDER BY c.id DESC
            ");
            $stmt->execute([
                ":sprint_id"=>$sprint_id
            ]);
            $comps=$stmt->fetchAll();
            if(!$comps){
                return false;
            }
            return $comps;
        }catch(PDOException $e){
            return false;
        }
    }

    // Récupérer tous les sprints avec leurs compétences assignées
    public function get_all_sprints_with_comps(){
        try{
            $stmt=$this->db->prepare("
                SELECT s.id, s.nom, s.date_debut, s.date_fin,
                       COUNT(sc.comp_id) as nb_comp
                FROM sprint s
                LEFT JOIN sprint_comp sc ON s.id = sc.sprint_id
                GROUP BY s.id, s.nom, s.date_debut, s.date_fin
                ORDER BY s.id DESC
            ");
            $stmt->execute();
            $sprints=$stmt->fetchAll();
            return $sprints ? $sprints : false;
        }catch(PDOException $e){
            return false;
        }
    }

    // Supprimer une assignation
    public function remove_comp_from_sprint($sprint_id, $comp_id){
        try{
            $stmt=$this->db->prepare("DELETE FROM sprint_comp WHERE sprint_id=:sprint_id AND comp_id=:comp_id");
            return $stmt->execute([
                ":sprint_id"=>$sprint_id,
                ":comp_id"=>$comp_id
            ]);
        }catch(PDOException $e){
            return false;
        }
    }

    // Récupérer toutes les compétences disponibles (non assignées à ce sprint)
    public function get_available_comps($sprint_id){
        try{
            $stmt=$this->db->prepare("
                SELECT c.id, c.code, c.label, c.niveau
                FROM competence c
                WHERE c.id NOT IN (
                    SELECT comp_id FROM sprint_comp WHERE sprint_id = :sprint_id
                )
                ORDER BY c.id DESC
            ");
            $stmt->execute([
                ":sprint_id"=>$sprint_id
            ]);
            $comps=$stmt->fetchAll();
            return $comps ? $comps : [];
        }catch(PDOException $e){
            return [];
        }
    }
}
