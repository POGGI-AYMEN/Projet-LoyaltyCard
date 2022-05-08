<?php

include "../models/prestationModel.php";

$prstations = PrestationModel::selectAll() ;




if (isset($_POST['addPrestation'])) {

    if (empty($_FILES['image']) || empty($_POST['prestation']) || empty($_POST['catégorie']) || empty($_POST['date_fin']) || empty($_POST['date_debut']) || empty($_POST['description'])) {

    } else {
        $error = "merci de remplire tous les champs " ;
    }


    $product['prestation'] = htmlspecialchars($_POST['prestation']);
    $product['catégorie'] = htmlspecialchars($_POST['catégorie']);
    $product['date_debut'] = htmlspecialchars($_POST['date_debut']);
    $product['date_fin'] = htmlspecialchars($_POST['date_fin']);
    $product['description'] = htmlspecialchars($_POST['description']);
    $product['entreprise'] = $_GET['id'] ;

    $imgName = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $extension = pathinfo($imgName, PATHINFO_EXTENSION);

    if ($size > 42000000) {
        $error = "fichier trop volumineux";
    } elseif (!in_array($extension, ["jpg", "png", "svg", "jpeg"])) {
        $error = "seul les format jpg svg png et jpeg sont autorisé";
    } else {
        $product['image'] = $imgName;


        PrestationModel::insert($product);

        $path = $_SERVER['DOCUMENT_ROOT'] . '/WEB/uploads/images/' . $product['image'];

        move_uploaded_file($_FILES['image']['tmp_name'], $path);

       header('location:../view/gestion-de-prestations.php') ;
    }

}

if (isset($_POST['deletePrestation']))
{
    PrestationModel::deleteWhere($_GET['id']) ;

    header('location:../view/gestion-de-prestations.php');
}

if (isset($_POST['updatePrestation']))
{
    $prstations['prestation'] = $_POST['prestation'] ;

    $prstations['catégorie'] = $_POST['catégorie'] ;

    $prstations['date_fin'] = $_POST['date_fin'] ;

    $prstations['description'] = $_POST['description'] ;

    PrestationModel::update($prstations , $_GET['id']) ;

    header('location:../view/modifier-supprimer-prestation.php?id='.$_GET['id']);

}

if (isset($_GET['prestation']) && $_GET['clientId'])
{
    include "../config/database.php";

    $insert =$con->prepare("INSERT INTO Prestation_clients (prestation , client) VALUES (? , ?)") ;

    $insert->execute([$_GET['prestation'],  $_GET['clientId']]) ;

    header('location:../view/prestations.php');

}
if (isset($_GET['cancel']) && $_GET['clientId'])
{
    echo "ok" ;
    include "../config/database.php";

   $query = $con->prepare("DELETE FROM Prestation_clients WHERE prestation = ? AND client = ?") ;

   $query->execute([$_GET['cancel'] , $_GET['clientId']]) ;

    header('location:../view/prestations.php');
}



