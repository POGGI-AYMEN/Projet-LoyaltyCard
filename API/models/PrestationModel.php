<?php

    class PrestationModel
    {
        public function selectAllWhere($where , $value)
        {
            include "config/Database.php" ;

            $dbConnexion = Database::getConnection();


            $selectQuery = $dbConnexion->prepare("SELECT * FROM Prestation WHERE " . $where . " = ?");

            $selectQuery->execute([$value]);

            $result = $selectQuery->fetchAll() ;

            return $result ;

        }

        public function deleteWhere($id)
        {
            include "config/Database.php";

            $dbConnexion = Database::getConnection();

            $selectQuery = $dbConnexion->prepare("DELETE FROM Prestation WHERE id = ?");

            $selectQuery->execute([$id]);

        }

        public function insert($product)
        {
            include "config/Database.php";

            $dbConnexion = Database::getConnection();


            $insertQuery = $dbConnexion->prepare("INSERT INTO Prestation (nom , date_debut , date_fin , catégorie , description  , entreprise ) VALUES (?, ?,? , ?  , ? , ? )") ;

            $insertQuery->execute([
                $product['prestation'] ,
                $product['date_debut'] ,
                $product['date_fin'] ,
                $product['catégorie'] ,
                $product['description'] ,
                $product['entreprise'],

            ]) ;
        }
        public function updateDebut ($data , $article)

        {
            include "config/Database.php" ;

            $dbConnexion = Database::getConnection() ;

            $updateQuery = $dbConnexion->prepare("UPDATE Prestation SET date_debut = ? WHERE id = ?") ;

            $updateQuery->execute([$data['data'] , $article]) ;

        }

        public function updateFin($data , $article)
        {
            include "config/Database.php" ;

            $dbConnexion = Database::getConnection() ;

            $updateQuery = $dbConnexion->prepare("UPDATE Prestation SET date_fin = ? WHERE id = ?") ;

            $updateQuery->execute([$data['data'] , $article]) ;
        }
    }