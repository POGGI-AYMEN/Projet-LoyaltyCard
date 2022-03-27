<?php

/* verification si une address email est déja enregistrer ou pas dans la base de donnée */

include "database.php" ;

$req = $con->prepare("SELECT * FROM Clients WHERE email =  ? ") ;  /* requete sql select */

$req->execute([$_GET['email']]) ;      /* l'address email envoyer par la requete GET ajax */

$result = $req->fetch() ;

if($result) {
    echo json_encode($result) ;     /* transformation des données de fetch en format JSON*/
}



?>
