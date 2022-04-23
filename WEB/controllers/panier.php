<?php

include "client.php" ;

include "../models/panierModel.php" ;


// Affichage de tous les article du client de la session courante

$clientId = $_SESSION['clientId'] ;


$myPanel = PanelModel::selectAll($clientId) ;


// incrémenté un article dans le panier //

if (isset($_GET['incArticle']) && !empty($_GET['incArticle']))
{
    include "../models/articleModel.php" ;

    $article = $_GET['incArticle'] ;
    $articleData = ArticleModel::selectAllWhere("nom" , $article) ;
    $stock = $articleData['quantité'] ;
    $panelData = PanelModel::quantity($article , $clientId) ;
    $panelQuantity = (int)$panelData['quantité'] ;

    if ($stock > 0)
    {
        if ($stock > $panelQuantity)
        {

            PanelModel::updateWherePlus('article' , $article , $clientId) ;
            header("location:../view/page_panier.php") ;
        }
        else
        {
            header("location:../view/page_panier.php?error=cet article n'est plus disponible en stock") ;
        }

    }




}

// decrementer un article du panier

if (isset($_GET['decArticle']) && !empty($_GET['decArticle']))
{
    include "../models/articleModel.php" ;
    $articleName = $_GET['decArticle'] ;

    $article = PanelModel::selectAllWhereClient("article" , $articleName , $_SESSION['clientId']) ;

    if ($article['quantité'] > 1)
    {
        PanelModel::updateWhereMinus("article" , $articleName , $clientId) ;


        header("location:../view/page_panier.php") ;

        die() ;
    }

    else

    {
        PanelModel::deletFromWhere("article" , $articleName , $clientId) ;

        header("location:../view/page_panier.php") ;

        die() ;
    }
}

// retirer un article du panier

if (isset($_GET['deleteArtilce']))
{

    $articleName = $_GET['deleteArtilce'] ;

    PanelModel::deletFromWhere("article" , $articleName , $clientId) ;

    header('location:../view/page_panier.php') ;
}


// Ajout d'un article au panier depuis la page des article de LoyaltyCard

if (isset($_GET['addArticle'])&& !empty($_GET['addArticle']))
{

    include "../models/articleModel.php" ;

    $articleCode = $_GET['addArticle'] ;
    $clientId = $_SESSION['clientId'] ;

    $selectedArticle = ArticleModel::selectAllWhere("codeArticle" , $articleCode) ;

    $exist = PanelModel::selectAllWhereClient("article" , $selectedArticle['nom'] ,$clientId) ;

    if (!empty($exist))
    {
        header('location:../view/artic.php?error=cette article existe déja dans votre panier') ;
        die() ;
    }

    $article['client'] = $_SESSION['clientId'] ;
    $article['article'] = $selectedArticle['nom'] ;
    $article['prix'] = $selectedArticle['prix'] ;
    $article['catégorie'] = $selectedArticle['catégorie'] ;
    $article['quantité'] = 1 ;
    $article['image'] = $selectedArticle['image'] ; 
    PanelModel::insertArticle($article) ;

    header('location:../view/artic.php?message=Article ajouter au panier') ;

    die() ;

}
