<?php
session_start() ; 

include "database.php" ; 

if (isset($_SESSION['clientId'])) 
{
    if (isset($_GET['code']) && !empty($_GET['code']))
    {
        $code = $_GET['code'] ; 
        
        $sql = "SELECT * FROM Article WHERE codeArticle = :code" ;   /* recupération de l'id de l'article passer par la requete get */

        $query = $con->prepare($sql) ; 

        $query->execute([
            'code' => $code
        ]) ;

        $article = $query->fetch(PDO::FETCH_ASSOC) ; 

        $prix = $article['prix'] ;
        $quantité = $article['quantité'] ; 
        $client = $_SESSION['clientId'] ; 
        $article = $article['nom'] ;   
        

            $sql = "INSERT INTO Panel (article , prix , quantité , client) VALUES (? , ? , ? , ?)" ;   /* enregistrement des article choisi dans la table panel
                                                                                                        on enregistre l'id de l'utilisateur également 
                                                                                                         */
            
            $query = $con->prepare($sql) ; 

            $query->execute([$article , $prix , $quantité , $client ]) ; 
            
             
        
        
        
    } 
} else 
{
    header('location:../error.php?message=403 Forbbiden') ;   /* redirection on cas de session non ouvert  */
}


