<?php 

class Data {

    private $db; 
    private function __construct{}

    public static function connect {

        try {
            $pdo = new PDO(
                "pgsql:host=db;port=5432;dbname=mydb",
                "postgres",
                "postgres"
            );

        }catch (PDOException $e) {
            echo "❌ Erreur : " . $e->getMessage();
        }


    }

}

// try {
//     $pdo = new PDO(
//         "pgsql:host=db;port=5432;dbname=mydb",
//         "postgres",
//         "postgres"
//     );
//     echo "✅ Connexion PostgreSQL OK";
// } catch (PDOException $e) {
//     echo "❌ Erreur : " . $e->getMessage();
// }
