<?php 
session_start() ; 

if (isset($_SESSION['adminId'])) {            			/* verification d'une session d'admine ouverte*/

include "../config/database.php" ; 

if (isset($_GET['id']) && !empty($_GET['id'])) {      /* recupération de la valeur de l'id passer dans les paramettre de get */
	$id = $_GET['id'] ; 
}

$sql = "DELETE FROM Entreprise WHERE id = ?" ;     /* delete sql query */
$req = $con->prepare($sql) ; 

$req->execute([$id]) ; 

header('location:gestion_entreprise.php') ;   /* redirction vers la page des liste entreprise */


} else {

header('location:../error.php?message=403 Forbidden') ;   /* redirection vers la pages des erreur */

}



 ?>
