<?php

    class CandidatureModel 
    {
        public function count() 
        {
            include "../config/database.php" ; 

            $countQuery = $con->prepare("SELECT * FROM Candidature") ; 
            $countQuery->execute() ; 

            $count = $countQuery->rowCount() ; 
            
            return $count ; 
        }

        public function selectAllWhere($email)  
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT * FROM Candidature WHERE email = ?") ; 

            $selectQuery->execute([$email]) ; 

            $result = $selectQuery->fetch(PDO::FETCH_ASSOC) ; 

            return $result ; 

        }

        public function selectAll() 
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT * FROM Candidature ") ; 

            $selectQuery->execute() ; 

            $result = $selectQuery->fetchAll() ;

            return $result ; 
           
           
        }

       public function deletWhere($where , $value) {
            include "../config/database.php" ; 

            $deletQuery = $con->prepare("DELETE FROM Candidature WHERE ".$where." = ?") ; 

            $deletQuery->execute([$value]) ; 
       }
    }