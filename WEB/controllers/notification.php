<?php 
    class Notification
    {
        public function showAllNotifications($client) 
        {

            include_once "../models/notificationModel.php" ; 
            $notifications = NotificationModel::selectAll($client) ; 

            return $notifications ; 
        }

        public function getNotificationsCount($client) 
        {
            include_once "../models/notificationModel.php" ; 

            $count = NotificationModel::selectCount($client) ; 
            
            return $count ; 
        }

        public function updateNotificationStatus($id ,$client) 
        {
            include "../config/database.php" ;

            NotificationModel::updateStatus($id , $client) ; 
        }

  

        public function deleteNotification($client) 
        
        {
            include_once "../models/notificationModel.php" ; 

            if (isset($_GET['delNotification'])) 
            {
                if ($_GET['delNotification'] === 'all') 
                {
                    NotificationModel::deleteAll($client) ; 

                }
                else
                {
                    $id = $_GET['delNotification'] ; 
                    NotificationModel::delete($id , $client) ; 
                }
            }

        }

    }