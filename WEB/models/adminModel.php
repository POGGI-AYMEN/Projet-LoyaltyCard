<?php 

    class AdminModel 
    {
        public function selectWhere($where , $value)  
        {   
            include '../config/database.php' ; 

            $selectQuery = $con->prepare("SELECT * FROM Admin WHERE ". $where ." = ? ") ; 

            $selectQuery->execute([$value]) ; 

            $Admin = $selectQuery->fetch(PDO::FETCH_ASSOC) ; 

            return $Admin ; 
        }
    }