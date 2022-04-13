<?php 

    class ArticleModel 
    {
        public function selectAll() 
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT * FROM Article "); 

            $selectQuery->execute() ; 

            $articles = $selectQuery->fetchAll() ; 

            return $articles ; 
        }

        public function selectAllWhere($where , $value) 
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT * FROM Article WHERE ".$where." = ?") ; 

            $selectQuery->execute([$value]) ; 

            $article = $selectQuery->fetch(PDO::FETCH_ASSOC) ; 

            return $article ; 
        }

        public function updateWhereMinus($where , $value) 
        {
            include "../config/database.php" ; 

            $updateQuery = $con->prepare("UPDATE Article SET quantité = quantité - 1 WHERE " .$where. " = ?") ; 

            $updateQuery->execute([$value]) ; 
        }
        public function updateWherePlus($where , $value) 
        {
            include "../config/database.php" ; 

            $updateQuery = $con->prepare("UPDATE Article SET quantité = quantité + 1 WHERE " .$where. " = ?") ; 

            $updateQuery->execute([$value]) ; 
        }
    
    }