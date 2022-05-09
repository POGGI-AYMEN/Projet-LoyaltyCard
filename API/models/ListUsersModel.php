<?php

    class ListUsersModel{


        public function get($prst)
        {
            include "config/Database.php";

            $dbConnexion = Database::getConnection() ;

            $select = $dbConnexion->prepare('SELECT * FROM Prestation_clients WHERE prestation = ?') ;

            $select->execute([$prst]) ;

            $result = $select->fetchAll() ;

            return $result ;

        }
    }