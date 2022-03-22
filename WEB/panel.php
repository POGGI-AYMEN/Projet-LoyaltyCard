<?php
session_start() ;

include "config/database.php" ; 

if (isset($_SESSION['clientId']))
{
    $id = $_SESSION['clientId'] ; 
    $sql = "SELECT * FROM Panel WHERE id = ?" ;        /* on selectione les article acheter par le cleient connecter */
    
    $query = $con->prepare($sql) ; 

    $query->execute([$id]) ; 

    $result = $query->fetch(PDO::FETCH_ASSOC) ;
    
    print_r($result) ; 

} else 
{
    header('location:error.php?message=403 Forbbiden') ; 
}


?>