<?php 

if (isset($_GET['id'])) 
{
    $id = $_GET['id'] ; 
}

?>

<p id ="notif-id"><?php echo $id ?></p>

<script src="../JS/updateNotificationCount.js"></script>

