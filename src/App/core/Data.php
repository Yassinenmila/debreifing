<?php 
namespace App\core;
use PDO;
use PDOException;

class Data {

    private PDO $db; 

    private static ?Data $inst=null;

    private function __construct(){
        try {
            $this->db = new PDO(
                "pgsql:host=db;port=5432;dbname=mydb",
                "postgres",
                "postgres",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );

        }catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public static function getinstance(){
        if(self::$inst===null){
            self::$inst = new Data();
        }
        return self::$inst;
    }
    public function connect() :PDO{
        return $this->db;
    }
}