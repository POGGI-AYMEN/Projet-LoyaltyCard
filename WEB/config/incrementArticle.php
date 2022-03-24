<?php 

include "database.php" ; 
session_start() ; 

if (isset($_SESSION['clientId']))
{
    $client = $_SESSION['clientId']; 
    $quantity = $_GET['quantity'] ; 
    $article = $_GET['article'] ; 


$selectQuery = $con->prepare("SELECT quantité FROM Article WHERE nom = ?") ; 

$selectQuery->execute([$article]) ; 

$result = $selectQuery->fetch(PDO::FETCH_ASSOC) ; 

if ($result['quantité'] > 0) 
{
  

 
        $updatQuery = $con->prepare("UPDATE Panier SET quantité = quantité + 1 WHERE article = ?") ; 

        $updatQuery->execute([$article]) ; 

        $updatQuery2 = $con->prepare("UPDATE Article SET quantité = quantité - 1 WHERE nom = ?") ; 

        $updatQuery2->execute([$article]) ; 

        header('location:../panel.php') ; 

        die() ; 
    

} 

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