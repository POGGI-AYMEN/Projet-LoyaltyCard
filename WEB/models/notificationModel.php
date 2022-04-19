<?php 

    class NotificationModel 
    {
        public function insert($notification) 
        {
            include "../config/database.php" ; 

            $insertQuery = $con->prepare('INSERT INTO Notification (date, curent_points, new_points , message , status , client) VALUES (? , ? , ? , ? , ? , ?)') ; 

            $insertQuery->execute([
                $notification['date'] , 
                $notification['curentPoints'] ,
                $notification['newPoints'] ,
                $notification['message'] , 
                $notification['status'],
                $notification['client']
            ]);
        }

        public function selectAll($client) 
        {
            include "../config/database.php" ; 

            $selectQuery = $con->prepare('SELECT * FROM Notification WHERE client = ?') ;
            
            $selectQuery->execute([$client]) ; 

            $result = $selectQuery->fetchAll() ; 

            return $result ; 
         }

         public function selectCount($client) 
         {
             include "../config/database.php" ; 

             $selectQuery = $con->prepare("SELECT * FROM Notification WHERE status = 0 AND client = ?") ; 

             $selectQuery->execute([$client]) ; 

             $count = $selectQuery->rowCount() ;

             return $count ; 
         }

         public function updateStatus($id , $client) 
         {
             include "../config/database.php" ; 

             $updateQuery = $con->prepare('UPDATE Notification SET status = 1 WHERE id = ? AND client = ? ') ; 

             $updateQuery->execute([$id , $client]) ;
         }

         public function deleteAll($client) 
         {
             include "../config/database.php" ; 

             $deleteQuery = $con->prepare('DELETE FROM Notification WHERE client = ?') ; 

             $deleteQuery->execute([$client]) ;  
         }

         public function delete($id , $client) 
         {
            include "../config/database.php" ; 

             $deleteQuery = $con->prepare('DELETE FROM Notification WHERE id = ? AND client = ?') ; 

             $deleteQuery->execute([$id , $client]) ; 
         }
    }