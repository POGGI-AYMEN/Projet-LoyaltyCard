<?php
include "database.php" ; 

function getNewPassword() {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
  
      for ($count = 0; $count < 8 ; $count++) {      /* une fonction de création d'une random chaine de caractere d'une taille de 8 */
        $tmp = rand(0, strlen($characters) - 1);
        $string .= $characters[$tmp];
    }
  
    return $string;
}


if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['phone'])) { 
            
        $email = htmlspecialchars($_POST['email']) ;   /* récupération des valeur de la requete post*/
        $phone = htmlspecialchars($_POST['phone']) ; 


        $sql = "SELECT * FROM Clients WHERE email = :email AND num_tel = :phone" ;  /* query sql */
        $req = $con->prepare($sql) ; 

        $req->execute([
            'email' => $email ,     /* on passe email et phone comme paramettre de la requete */
            'phone' => $phone 
        ]);
        
        $result = $req->fetch(PDO::FETCH_ASSOC) ;     /* recherche des résultats */

        
        if (!empty($result)) {
            
            $password =  base64_encode(hash_hmac('sha256' , getNewPassword() , 'toto'));   /* génération et hashage d'un nouveau mot de passe */
     
                                                                                            
            $update = "UPDATE Clients SET mdp = :password WHERE email = :email" ; /* requete SQL update */   

            $updateQuery = $con->prepare($update) ; 
 
            $updateQuery->execute([                      /* execution de la query sql on envoie ($password & $email) comme des paramettre*/
                'password' => $password ,                                            /* de la requete*/
                'email' => $email
            ]) ;

        
            if($updateQuery) {                            /* en cas d'envoi de la requete update avec success on envoie un email qui contient le nouveau mot de passe */
                $message = "<html>
                    <p>Vous avez effecuté une demande de récupération de mot de votre mot de passe</p>
                    <br>
                    <p> votre nouveau mot de passe : <?php $password ?> </p>
                    </html>" ; 
                $headers = 'From: loyalty.card6@gmail.com' . "\r\n" ;

                mail($email , "recupération de mot de passe" , $message) ;    /* envoi de l'email */
                
                
                header('location:../connexion.php') ;                       /* redirection vers la page de connexion */
            
                }
        } else {
            $error = "Adresse emil ou numéro de téléphone non correcte" ;    /* verification si l'adresse email ou le numéro de téléphone */
        }                                                                            /* ne sont pas enregistrer dans la bdd*/


    }

            
        else {
        $error = "veuillez remplir tous les champs" ;          /* verification si l'un des champs de saisie est vide*/
    }
 }





?>




 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../style/inscreption.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Compte créer</title>
   </head>
   <body>

<style>


.contanier{
position: absolute;
left: 50% ;
top : 50% ;
transform: translate(-50% , -50%);
height: 400px ;
width: 800px;
border: solid 2px white ;
background-color: white;
border-top-left-radius: 25px;
border-bottom-right-radius: 25px;
box-shadow: 15px 15px 15px 10px ;
  opacity: 0.7;
}

h1 , h2{
  text-align: center;
  background: linear-gradient(to left ,#0072ff, #8811c5);
  -webkit-background-clip: text ;
  -webkit-text-fill-color: transparent ;

}
p{
  margin-left: 20px ;
  margin-right: 20px;
  margin-top: 40px;
  margin-bottom: 50px;
  font-size: 20px;
  text-align: center;
}
a{
  position: relative;
  left:41%;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
  background: linear-gradient(to left ,#0072ff, #8811c5);
  border: 2px solid white;
  padding: 15px;
  color: white;
  border-radius: 15px;

}


</style>

    <div class="contanier">
        <p id="error-1"><?php  if(!empty($error)) echo $error ?></p>
        <h1>Avez-vous oublié votre mot de passe</h1>
        
        <form method="post">

        <input type="email" name="email" placeholder="entrer votre adresse email">
        
        <input type="text" name="phone" placeholder="entrer votre numéro de téléphone">

        
        
        <input type="submit" name="submit" value="envoyer" class="btn" style="position:relative; left:7%;" >



        </form>

    </div>



   </body>


 
