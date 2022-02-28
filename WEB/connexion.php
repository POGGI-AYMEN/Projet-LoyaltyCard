<?php
session_start() ;
include "config/connect.php" ;

 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style/inscreption.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Inscription</title>
   </head>
   <body>

<form method="post">
     <div class="connexion-container" id="form-1">
    
         <h3>Se connecter</h3>
         <br>
         <p id="error-1"></p>
         <input type="email" name="email" placeholder="Adresse email">
         <br>
         <input type="password" name="password" placeholder="Mot de passe">
         <br><br>
         <div class="btn-box">
<input type="submit" name="connect" value="Se connecter" class="btn" >         </div>
  <a href="inscreption.php">Vous n'avez pas un compte s'inscrir</a>
  <br>
  <a href="config/getPassword.php">Mot de passe oublié</a>
</div>

    </form>


    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./JS/inscription.js"></script>

   </body>


 </html>
