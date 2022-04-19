<?php 

    class ClientModel
    {
        public function addClient($client)
        {
            include '../config/database.php' ; 

            $insertQuery = $con->prepare("INSERT INTO Clients (nom, prenom, num_tel, email, mdp, adresse, ville ,code_postal ,pays, num_carte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? , ?)") ;

            $insertQuery->execute([
                $client['name'] , 
                $client['lastName'] , 
                $client['phone'] , 
                $client['email'] , 
                $client['password'] , 
                $client['adresse'] , 
                $client['city'] , 
                $client['code_postal'] , 
                $client['country'] , 
                $client['card_number']
            ]) ;

        }

        public function selectAll()
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare("SELECT * FROM Clients") ; 

            $selectQuery->execute() ; 

            $client = $selectQuery->fetchAll() ; 

            return $client ; 

        }

        public function selectWhere($where , $value) 
        {
            include '../config/database.php' ; 

            $selectQuery = $con->prepare("SELECT * FROM Clients WHERE ".$where." = ?") ; 

            $selectQuery->execute([$value]) ; 

            $client = $selectQuery->fetch(PDO::FETCH_ASSOC) ; 

            return $client ; 
        }

        public function count()
        {
            include "../config/database.php" ; 

            $countQuery  = $con->prepare("SELECT * FROM Clients") ; 

            $countQuery->execute() ; 

            $clientCount = $countQuery->rowCount() ;
            
            return $clientCount ; 
        }

        public function updateWhere($set , $setValue , $where , $whereValue)  
        {
            include "../config/database.php" ; 

            $updateQuery = $con->prepare("UPDATE Clients SET ".$set."= ? WHERE ".$where." = ?") ; 

            $updateQuery->execute([
                $setValue ,
                $whereValue 
            ]) ; 
        }

        public function updateClientInfo($client , $id) 
        {
            include "../config/database.php" ; 

            include "../config/database.php" ; 

            $update = $con->prepare("UPDATE Clients SET nom = ? , prenom = ? , email = ? , mdp = ? , pays = ? , adresse = ? , num_tel = ? , code_postal = ?  WHERE id = ?") ;
    
            $update->execute([
                $client['nom'] ,
                $client['prenom'] ,
                $client['email'] ,
                $client['password'] ,
                $client['pays'] , 
                $client['adress'] , 
                $client['phone'],
                $client['code_postal'],
    
                
                $id 
            
            ]) ; 
        }
    }