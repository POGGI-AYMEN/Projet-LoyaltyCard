<?php 

include "database.php" ; 
session_start() ; 

if (isset($_SESSION['clientId']))    // verification d'une session d'un client ouvert 
{
    $client = $_SESSION['clientId']; 
    $quantity = $_GET['quantity'] ; 
    $article = $_GET['article'] ; 


$selectQuery = $con->prepare("SELECT quantité FROM Article WHERE nom = ?") ;   // on cherche la quantité de l'article q'on souhaite l'incrémenté

$selectQuery->execute([$article]) ; 

$result = $selectQuery->fetch(PDO::FETCH_ASSOC) ; 

/**
 * si la valeur de quantité  > 0 donc l'article est présent dans le stock on exécute les query mysql au dessous
 * sinon on averti le client que l'article n'est plus disponible
 */

if ($result['quantité'] > 0)   
{
  

 
        $updatQuery = $con->prepare("UPDATE Panier SET quantité = quantité + 1 WHERE article = ?") ; 

        $updatQuery->execute([$article]) ;   // on update le panier du client 

        $updatQuery2 = $con->prepare("UPDATE Article SET quantité = quantité - 1 WHERE nom = ?") ; 

        $updatQuery2->execute([$article]) ; // on update les stock de LoyaltyCard 

        header('location:../panel.php') ;   // redirection vers le panier de l'utilisateur 

        die() ; 
    

} 
// gestion des cas des erreurs // 
else
{
    header("location:../panel.php?error=cette article n'est plus disponible en stock ") ; 
    die() ; 
}
}
else 
{
    header('location:../error.php?message=403 Forbbiden') ; 
}


?>