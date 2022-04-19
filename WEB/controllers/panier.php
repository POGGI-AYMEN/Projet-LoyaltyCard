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

    $emptyStock = ArticleModel::selectAllWhere("nom" , $article) ; 

    if ($emptyStock['quantité'] <= 1) 
    {
        header("location:../view/page_panier.php?error=cet article n'est plus disponible dans le stock ") ; 
        die() ; 
    }
        else
    {
        PanelModel::updateWherePlus("article" , $article ,$clientId) ; 

        ArticleModel::updateWhereMinus("nom" , $article , $clientId) ; 

        header('location:../view/page_panier.php') ; 

        die() ; 
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

        ArticleModel::updateWherePlus("nom" , $articleName , $clientId) ; 

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
        header('location:../view/Articles.php?error=cette article existe déja dans votre panier') ; 
        die() ; 
    }

    $article['client'] = $_SESSION['clientId'] ;
    $article['article'] = $selectedArticle['nom'] ; 
    $article['prix'] = $selectedArticle['prix'] ; 
    $article['catégorie'] = $selectedArticle['catégorie'] ; 
    $article['quantité'] = 1 ; 
    PanelModel::insertArticle($article) ;
    
    header('location:../view/Articles.php?message=Article ajouter au panier') ; 

    die() ; 
    
}
