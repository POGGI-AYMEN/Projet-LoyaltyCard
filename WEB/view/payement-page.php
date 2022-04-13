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
    
    <link rel="stylesheet" href="../css/payement-page.css">
   <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/UserAccount.css">
    <link rel="stylesheet" href="../css/user_footer.css"> 
    <title>Notifications </title>
</head>
<body>
<?php require("navbar.php"); ?>
<br><br>

<div class="container">
    <h2 class="my-4 text-center">Paiement</h2>
    <form action="./charge.php" method="post" id="payment-form">
      <div class="form-row">
       <input type="text" name="first_name" class="form-control  mb-3 StripeElement StripeElement--empty" placeholder="Nom">
       <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Prenom">
       <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Adresse email">
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>
      <button>Submit Payment</button>
    </form>
  </div>

  <script src="https://js.stripe.com/v3/"></script>
  <script src="../JS/charge.js"></script>
<?php require("footer.php")?>