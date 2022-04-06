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
<link rel="stylesheet" href="../../back-office_/css/sb-admin-2.css">
    
    <link rel="stylesheet" href="../../css/notifications.css">
   <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/UserAccount.css">
    <link rel="stylesheet" href="../../css/user_footer.css"> 
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
  <p class="dismiss text-right"><a id="dismiss-all" href="#">Tout supprimer</a></p>
  <div class="card notification-card ">
    <div class="card-body">
      <table>
        <tr>
          <td style="width:70%"><div class="card-title">Jane invited you to join '<b>Familia</b>' group</div></td>
          <td style="width:30%">
            <a href="#" class="btn btn-primary">View</a>
            <a href="#" class="btn btn-danger dismiss-notification">Supprimer</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  
  <div class="card notification-card ">
    <div class="card-body">
       <table>
        <tr>
          <td style="width:70%"><div class="card-title">Your expenses for '<b>Groceries</b>' has exceeded its budget</div></td>
          <td style="width:30%">
            <a href="#" class="btn btn-primary">View</a>
            <a href="#" class="btn btn-danger dismiss-notification">Supprimer</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  
  <div class="card notification-card ">
    <div class="card-body">
       <table>
        <tr>
          <td style="width:70%"><div class="card-title">Insufficient budget to create '<b>Clothing</b>' budget category</div></td>
          <td style="width:30%">
            <a href="#" class="btn btn-primary">View</a>
            <a href="#" class="btn btn-danger dismiss-notification">Supprimer</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  
  <div class="card notification-card ">
    <div class="card-body">
       <table>
        <tr>
          <td style="width:70%"><div class="card-title">You have <b>2</b> upcoming payment(s) this week</div></td>
          <td style="width:30%">
            <a href="#" class="btn btn-primary">View</a>
            <a href="#" class="btn btn-danger dismiss-notification">Supprimer</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  
  
</div>
            </div>	
		</div>
    </div>
</div>
    <?php require("../footer.php"); ?>
