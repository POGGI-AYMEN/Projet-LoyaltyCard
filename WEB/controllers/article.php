<?php

include_once "../models/articleModel.php" ;



$articles = ArticleModel::selectAll() ;



if (isset($_POST['submit']))
{

    $article['prix'] = $_POST['prix'] ;
    $article['catégorie'] = $_POST['catégorie'] ;
    $article['quantité'] = $_POST['quantité'] ;
    $article['Description'] = $_POST['Description'] ;

    $article['codeArticle'] = $_GET['code'] ;

    ArticleModel::updateArticle($article) ;

    header('location:../back-office_/stockHandling.php') ;

}

if (isset($_GET['removeArticle']))

{
    include "admin.php" ;

    $articleCode = $_GET['removeArticle'] ;

    ArticleModel::deleteFrom($articleCode) ;

    header('location:../back-office_/stockHandling.php') ;
}




if (isset($_POST['newArticle']) && !empty($_POST['newArticle']))

{
    include "admin.php" ;
    if (empty($_POST['article']) || empty($_POST['prix']) || empty($_POST['quantité']) || empty($_POST['description']) || empty($_FILES['photo']) || empty($_POST['catégorie']) || empty($_POST['entrepots']))
    {
        $error = "Tous les champs doivent etre remplis ! " ;

    }
    else
    {
        $product['codeArticle'] =  ArticleModel::generateCode() ;
        $product['nom'] = htmlspecialchars($_POST['article']) ;
        $product['quantité'] = (int)htmlspecialchars($_POST['quantité']) ;
        $product['prix'] = (int)htmlspecialchars($_POST['prix']) ;
        $product['description'] = htmlspecialchars($_POST['description']) ;
        $product['catégorie'] = htmlspecialchars($_POST['catégorie']) ;
        $product['entrepots'] = $_POST['entrepots'] ;
        $verif = ArticleModel::selectAllWhere("nom" , $product['nom']) ;


        $imgName = $_FILES['photo']['name'] ;
        $size = $_FILES['photo']['size'] ;
        $extension = pathinfo($imgName , PATHINFO_EXTENSION) ;

        if ($size > 42000000) { $error = "fichier trop volumineux" ; }

        elseif(!in_array($extension , ["jpg" , "png" , "svg" , "jpeg"])) { $error = "seul les format jpg svg png et jpeg sont autorisé" ;}

        elseif(!is_int($product['prix'])) { $error = "le prix doit etre une valeur numérique" ; var_dump($product['prix']) ;}

        elseif(!is_int($product['quantité'])) { $error = "la quantité doit etre une valeur numérique" ;}

        elseif(!empty($verif)) {$error = "cet article est déja enregistrer" ; }

        else
        {
            $product['image'] = $imgName ;

            ArticleModel::addNewArticle($product) ;

            $path = $_SERVER['DOCUMENT_ROOT'].'/WEB/uploads/images/'.$product['image']  ;

            move_uploaded_file($_FILES['photo']['tmp_name'], $path) ;

            $suc = "Article Ajouter" ;

        }


    }
}
//
//demande de retourner un article //

if (isset($_GET['returnId']) && !empty($_GET['returnId']))
{

    include "../models/historiqueModel.php" ;

    $articleData = HistoriqueModel::selectWhere("id" , $_GET['returnId'] , $_GET['clientId']) ;


    $article['date_de_retoure'] = date("j/n/Y") ;

    include "../models/clientModel.php" ;



    $article['client'] = $_GET['clientId'] ;

    $article['facture'] = $articleData[0]['facture_code'] ;

    $article['image'] = $articleData[0]['image'] ;

    $article['name'] = $articleData[0]['article'] ;

    $article['code'] = ArticleModel::generateCode() ;

    $exist = ArticleModel::verifReturn($article['facture']) ;

    var_dump($exist);

    if (empty($exist)) {  ArticleModel::return($article) ;  header('location:../view/returne_article.php?code='.$article['code']) ;}
    else{ header('location:../view/historique-des-achats.php?error=cet demande de retout est en cour de traitement');}

}
//accepter le retour d'un article //

if (isset($_GET['returned']))
{
    include  "../models/historiqueModel.php" ;
    include "../models/clientModel.php";
    include "../models/carteModel.php" ;
    include "../models/notificationModel.php";
    $code = $_GET['returned'] ;



    $articleData = HistoriqueModel::selectWhere('facture_code' , $code , $_GET['client']) ;

    $articleName = $articleData[0]['article'] ;

    $points = $articleData[0]['prix'] * 0.3 ;

    $clientData = ClientModel:: selectWhere("id" , $_GET['client']) ;

    $client = $clientData['num_carte'] ;




    ArticleModel::updateWherePlus('nom' ,$articleName ) ;

    HistoriqueModel::deleteWhere("facture_code" , $code) ;

    ArticleModel::deletReturn( "facture", $code) ;

    CarteModel::updatePointsAdd($points , $client) ;


    $notifcation['date'] = date("j/m/Y") ;
    $notifcation['curentPoints'] =      0 ;
    $notifcation['newPoints'] = $points ;
    $notifcation['message'] = "Votre retour d'article est accepter vous etes rembourssé par des points" ;
    $notifcation['status'] = 0 ;
    $notifcation['client'] = $clientData['id'] ;


    NotificationModel::insert($notifcation) ;

    header("location:../back-office_/retour-d'article.php") ;

}

if (isset($_GET['canc']))
{
    echo "ok";
    include  "../models/historiqueModel.php" ;
    include "../models/clientModel.php";
    include "../models/carteModel.php" ;
    include "../models/notificationModel.php";
    $code = $_GET['canc'] ;



    $articleData = HistoriqueModel::selectWhere('facture_code' , $code , $_GET['client']) ;

    $articleName = $articleData[0]['article'] ;

    $points = $articleData[0]['prix'] * 0.3 ;

    $clientData = ClientModel:: selectWhere("id" , $_GET['client']) ;

    $client = $clientData['num_carte'] ;

    $notifcation['date'] = date("j/m/Y") ;
    $notifcation['curentPoints'] =      0 ;
    $notifcation['newPoints'] = 0 ;
    $notifcation['message'] = "Votre demande de retour a été refuser contacter-nous pour plus d'information" ;
    $notifcation['status'] = 0 ;
    $notifcation['client'] = $clientData['id'] ;


    NotificationModel::insert($notifcation) ;

   // header("location:../back-office_/retour-d'article.php") ;

}

