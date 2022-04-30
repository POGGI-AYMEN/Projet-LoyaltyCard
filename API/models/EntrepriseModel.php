<?php

include "config/Database.php";


    class EntrepriseModel
    {
        public function selectWhere($where , $value)
        {
            $dbConnexion = Database::getConnection() ;
            $selectQuery = $dbConnexion->prepare("SELECT * FROM Entreprise WHERE ".$where." = ?") ;

            $selectQuery->execute([$value]) ;

            $company = $selectQuery->fetch() ;

            return $company ;
        }

        public function update($company , $entreprise)
        {
            $dbConnexion = Database::getConnection() ;


            $updateQuery = $dbConnexion->prepare('UPDATE Entreprise SET email = ? , gérant = ?, numéro_tel = ? , chiffre_daffaire = ?  , date_de_payement = ? WHERE id = ?') ;

            $updateQuery->execute([
                $company['email'] ,
                $company['gerant'] ,
                $company['num'] ,
                $company['chif_affaire'] ,
                $company['date'] ,
                $entreprise
            ]) ;
        }

        public function updatePassword ($data , $entreprise)
        {
            $dbConnexion = Database::getConnection() ;


            $updateQuery = $dbConnexion->prepare('UPDATE Entreprise SET mdp = ? WHERE id = ?') ;

            $password = base64_encode(hash_hmac('sha256' , $data , 'toto'));


            $updateQuery->execute([$password , $entreprise]) ;
        }
    }