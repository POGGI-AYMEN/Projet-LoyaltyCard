<?php 
    class MessagerieModel 
    {
        public function sendClientMessage($sender , $reciver , $message , $adminMessage) 
        {
            include "../config/database.php" ; 

            $insertQuery = $con->prepare('INSERT INTO Messagerie (sender , reciver , message , admin_message ) VALUES (? , ? , ? , ?)') ; 

            $insertQuery->execute([
                $sender , 
                $reciver , 
                $message,
                $adminMessage
            ]) ;

   
        }
        public function getAll($client) 
        {
            include "../config/database.php" ; 

            $select = $con->prepare('SELECT * FROM Messagerie WHERE sender = ? OR reciver = ?') ; 

            $select->execute([$client , $client]) ; 

            $messages = $select->fetchAll() ;
            
            return $messages ; 
        }

        public function adminGetAll($client) 
        {
            include "../config/database.php" ; 

            $select = $con->prepare('SELECT * FROM AdminMessagerie WHERE reciver = ?') ; 

            $select->execute([$client]) ; 

            $messages = $select->fetchAll() ;
            
            return $messages ; 

        }

    }