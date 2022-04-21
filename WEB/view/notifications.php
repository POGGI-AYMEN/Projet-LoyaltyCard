<?php 
include "../controllers/client.php" ; 

include "../controllers/notification.php" ; 

$notifications = Notification::showAllNotifications($_SESSION['clientId']) ; 

Notification::deleteNotification($_SESSION['clientId']) ; 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
<link rel="stylesheet" href="../back-office_/css/sb-admin-2.css">
    
    <link rel="stylesheet" href="../css/notifications.css">
   <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/UserAccount.css">
    <link rel="stylesheet" href="../css/user_footer.css"> 
    <title>Notifications </title>
</head>
<body>
<?php require("navbar.php"); ?>
<br><br>


<div class="container__">
	<div class="main-body">
		<div class="row">
			<?php require("menu.php") ?>
            <div class="col-lg-8">
            <div class="row notification-container">
  <h2 class="text-center"> Notifications</h2>


  <p class="dismiss text-right"><a id="dismiss-all" href="notifications.php?delNotification=all">Tout supprimer</a></p>

<?php 

foreach($notifications as $notification) 
{

?>


  <div class="card notification-card ">
    <div class="card-body">
       <table>
        <tr>
          <td style="width:70%"><div class="card-title"><?php echo $notification['message'] ;  ?></div></td>
          <td style="width:30%">
            <a href="notification_détails.php?id=<?php echo $notification['id']  ?> " class="btn btn-primary">View</a>
            <a href="notifications.php?delNotification=<?php echo $notification['id']; ?>" class="btn btn-danger dismiss-notification">Supprimer</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  

  <?php 
}
  ?>
  
</div>
            </div>	
		</div>
    </div>
</div>
<?php require("footer.php"); ?>
