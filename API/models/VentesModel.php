<?php
include "config/Database.php";

    class VentesModel
    {
        public function select($company)
        {
            $dbConnexion = Database::getConnection() ;

            $sqlQuery = $dbConnexion->prepare("SELECT * FROM Ventes WHERE vendeur = ?") ;

            $sqlQuery->execute([$company]) ;

            $result = $sqlQuery->fetchAll() ;

            return $result ;

        }
    }