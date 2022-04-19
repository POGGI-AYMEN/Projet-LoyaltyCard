<?php 

    class CarteModel 
    {
        public function createCard($card) 
        {
            include "../config/database.php" ; 

            $insertQuery = $con->prepare("INSERT INTO Carte (num_carte, points, code_barre) VALUES (? ,? , ?)") ; 

            $insertQuery->execute([
                $card['number'] , 
                $card['points'] , 
                $card['code']
            ]) ; 
        }
        
        public function selectPointsWhere($where , $value) 
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT points FROM Carte WHERE " .$where . " = ?") ; 

            $selectQuery->execute([$value]) ; 

            $points = $selectQuery->fetch() ; 

            return $points ; 
        }

        public function pointsCount($value)  
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT * FROM Carte WHERE num_carte = ?") ; 

            $selectQuery->execute([$value]) ; 

            $points = $selectQuery->fetch(PDO::FETCH_ASSOC) ;
            
           return $points ; 

        }

       public function updatePoints($points , $client) 
       {
           include "../config/database.php" ; 

           $updateQuery = $con->prepare("UPDATE Carte SET points = points - ? WHERE num_carte = ?") ; 

           $updateQuery->execute([$points , $client]) ;
       }

       public function updatePointsAdd($points , $client) 
       {
           include "../config/database.php" ; 

           $updateQuery = $con->prepare("UPDATE Carte SET points = points + ? WHERE num_carte = ?") ; 

           $updateQuery->execute([$points , $client]) ; 
       } 
    
}