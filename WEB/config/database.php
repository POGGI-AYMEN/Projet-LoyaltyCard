<?php
/* connexion a la base de donnée */
$username = "root" ;
$password = "root" ;

$con = new PDO('mysql:host=localhost;dbname=PA', $username , $password);

if (!$con) {   /* on cas d'echec de la connexion avec la base de donnée */
    header('location:error.php?message=impossible de se connecter à la base de donnée ') ;
}

 ?>

 
