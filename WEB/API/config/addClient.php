<?php
/* ajout d'un client a la base de donnée */

include "database.php" ;

if (isset($_POST['sub'])) {

/* récupéaration des variable de la requete post */

    $name = htmlspecialchars($_POST['name']) ;
    $lastName = htmlspecialchars($_POST['lastName']) ;
    $email = $_POST['email'] ;
    $password = base64_encode(hash_hmac('sha256' , $_POST['password'] , 'toto'));   /* hash de mot de passe en sha256 */
    $adress = htmlspecialchars($_POST['adress']) ;
    $city = htmlspecialchars($_POST['city']) ;
    $country = htmlspecialchars($_POST['country']) ;
    $phone = htmlspecialchars($_POST['phone']) ;
    $code = htmlspecialchars($_POST['code']) ;
    $cart = null ;

/*création d'une requete insert SQL */

    $sql = "INSERT INTO Clients (nom, prenom, num_tel, email, mdp, adresse, ville ,code_postal ,pays, num_carte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ;

    $req = $con->prepare($sql) ;

/*envoi de la requete */
    $res = $req->execute([$name , $lastName , $phone , $email , $password , $adress , $city , $code,$country , $cart]) ;

/*redirection */

    if(!empty($res)) {
      header('location:accountCreated.php?name='.$lastName." ".$name) ;
    } else {
      header('location:error.php?message=un probleme est produit lors de la création de votre compte') ;
    }
  }



?>
