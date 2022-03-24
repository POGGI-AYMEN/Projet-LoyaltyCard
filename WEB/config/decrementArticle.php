<?php 

include "database.php" ; 
session_start() ; 

if (isset($_SESSION['clientId']))
{
    $client = $_SESSION['clientId']; 
    $quantity = $_GET['quantity'] ; 
    $article = $_GET['article'] ; 

    if ($quantity == 1) 
    {
        $deleteQuery = $con->prepare("DELETE FROM Panier WHERE article = ?") ; 

        $deleteQuery->execute([$article]) ;  

        header('location:../panel.php') ; 

        die() ; 


    }

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
{
    header('location:../error.php?message=403 Forbbiden') ; 
}


?>