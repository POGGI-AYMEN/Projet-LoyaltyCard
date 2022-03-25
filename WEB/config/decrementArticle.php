<?php 

include "database.php" ; 
session_start() ; 

if (isset($_SESSION['clientId']))   // verification d'une session de client 
{
    $client = $_SESSION['clientId']; 
    $quantity = $_GET['quantity'] ;  // recupération des variable de la session et des requete GET 
    $article = $_GET['article'] ; 

    // si la quantité du produit présent dans le panier est 1 on suprime le produit du panier d
    if ($quantity == 1) 
    {
        $deleteQuery = $con->prepare("DELETE FROM Panier WHERE article = ?") ; 

        $deleteQuery->execute([$article]) ;  

        header('location:../panel.php') ; 

        die() ; 


    }
        /**
         * si la quantité > 1 on updte le pnier du client on rejoute un article et on update le stock on enleve 1 article 
         */
    if ($quantity > 1)
    {
        $updatQuery = $con->prepare("UPDATE Panier SET quantité = quantité - 1 WHERE article = ?") ; 

        $updatQuery->execute([$article]) ; 

        $updatQuery2 = $con->prepare("UPDATE Article SET quantité = quantité + 1 WHERE nom = ?") ; 

        $updatQuery2->execute([$article]) ; 

        header('location:../panel.php') ; 

        die() ; 
    }

} 
else 
{   // gestion des erreur 
    header('location:../error.php?message=403 Forbbiden') ; 
}


?>