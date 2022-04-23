<?php 

include "../controllers/client.php" ;

include "../controllers/notification.php" ;

include "../config/database.php" ;

$notificationInfo = Notification::getNotificationInfo("id" , $_GET['id']) ;
$gained = (int)$notificationInfo['new_points'] - (int)$notificationInfo['curent_points'] ;
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
	<link rel="stylesheet" href="../css/notifications_détails.css">

   <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/UserAccount.css">
    <link rel="stylesheet" href="../css/user_footer.css"> 


    <title>notification détaillé </title>
</head>
<body>
<?php require("navbar.php"); ?>
<br><br>


<div class="container__">
		<div class="main-body">
			<div class="row">
			    <?php require("menu.php") ?>	
				<div class="text_detail_notif col">
					 <!-- Star form compose mail -->
                     <form class="form-horizontal">
                    <div class="panel mail-wrapper rounded shadow row mail">
                        <h1>Détail de la notification</h1>
                        <div class="panel-body">
                            <div class="view-mail">
                             <h2>Vous venez d'effectuer un achat chez loyaltyCarde</h2>
                             <p>Vous trouverez ici les détaile de votre solde des points</p>
                             <br><br>
                             <p id="notif-id"><?php echo $_GET['id'] ; ?></p>
                             <p>Carte nuéméro : <?php echo $user['num_carte']  ?> </p>
                             <p>Votre sold des points avant l'achat: <?php echo $notificationInfo['curent_points'];  ?></p>
                                <p>Points gagner : <?php echo $gained ?> </p>
                                <p>Votre nouveau sold des points : <?php echo $notificationInfo['new_points'] ; ?></p>
                                <p></p>
                            </div><!-- /.view-mail -->
                        </div>
                    </div>
                </div>          
		    </div>
	</div>
</div>


<script src="../JS/updateNotificationCount.js"></script>


