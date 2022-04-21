<?php 

include "../controllers/client.php" ; 

include "../controllers/notification.php" ; 



 $notificationCount = Notification::getNotificationsCount($_SESSION['clientId']);

 echo json_encode($notificationCount);

if (isset($_GET['id'])) 
{
    $id = $_GET['id'] ; 

    Notification::updateNotificationStatus($id , $_SESSION['clientId']) ; 
}