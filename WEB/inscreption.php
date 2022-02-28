<?php
include "config/addClient.php" ;

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
     <div class="container" id="form-1">

         <h3>Création de compte</h3>
         <p id="error-1"></p>
         <input type="text" name="name" placeholder="Nom" id="name">
         <br>
         <input type="text" name="lastName" placeholder="Prénom" id="lastName">
         <br>
         <input type="email" name="email" placeholder="Adresse email" id="email">
         <br>
         <input type="password" name="password" placeholder="Mot de passe" id="password">
         <br>
         <input type="password" name="confirmation" placeholder="Confirmer votre mote de passe" id="confirmation">

         <div class="btn-box">
           <button type="button" name="next_1" class="btn" id="next_1">Suivant</button>
         </div>


     </div>

     <div class="container" id="form-2">

         <h3>Information personnel</h3>
        <p id="error-2"></p>
         <input type="text" name="adress" placeholder="Adresse" id="adresse">
         <br>
         <input type="text" name="city" placeholder="Ville" id="city">
         <br>
         <input type="text" name="code" placeholder="Code postale" id="code">
         <br>
         <input type="text" name="country" placeholder="Pays" id="country">
         <br>
         <input type="text" name="phone" placeholder="Numéro de téléphone" id="phone">

         <div class="btn-box">
<button type="button" name="next_2" class="btn" id="next_2">Suivant</button>
     </div>


     </div>
     <div class="container" id="form-3">

         <h3>Vérification de compte</h3>

         <p>entrer le code que vous avez reçu par email afin de confirmer votre compte</p>
         <p>(verifier vos spams)</p>
        <input type="text" name="verif_code" placeholder="code de verification" id="codeVerification">


         <div class="btn-box">
             <button type="button" name="button" id="verif" class="btn">Verifier</button>
           <input type="submit" name="sub" value="S'inscrire" class="btn" id="sub">
         </div>

         <p id="verifMessage"></p>
</div>
    </form>


    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./JS/inscription.js"></script>

   </body>


 </html>
