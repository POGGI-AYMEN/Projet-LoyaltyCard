<?php
include "controllers/Articles.php" ;


// on récupere la méthode de la requete http
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET")
{

    // retoure tous les article vendu par une entreprise choisi
    if (isset($_GET['company']))
    {
        $company = $_GET['company'] ;

       Article::getOneArticle("vendeur" , $company) ;
        die() ;

        // supprime un article de la base de donnée
    } elseif(isset($_GET['delete']))
    {
        $article = $_GET['delete'] ;
        Article::delete($article);

        // retourn tous les article
    }else
    {
        Article::get();
        die() ;
    }
}

if ($method === "PUT")
{
    /**
     * modifier soit le prix ou la quantité d'un article choisi
     * type ==> price || type ==> quantité
     * id ==> le code de l'article que l'on souhaite modifier
     */
    if (isset($_GET['id']) && isset($_GET['type']))
    {
        $article = $_GET['id'] ;
        $type = $_GET['type'] ;
       Article::update($article , $type);
        die();
    }


}
// ajoute un article au base de donnée
if ($method === "POST")
{
    Article::post() ;
    die() ;
}

