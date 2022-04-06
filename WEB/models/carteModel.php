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
        
    }