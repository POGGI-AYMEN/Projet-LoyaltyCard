<?php 

    
require '../models/clientModel.php' ;

session_start() ; 

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$check = strcmp($url ,"http://localhost/WEB/view/inscription.php") ; 

if ($check != 0) 
{
    if (isset($_SESSION['clientId']) && !empty($_SESSION['clientId'])) 
    {
        include "../models/carteModel.php" ; 

        $id = $_SESSION['clientId'] ; 

        $user = ClientModel::selectWhere("id" , $id) ;                // recupération des infor de client //
        
        $info_clients = ClientModel::selectAll();

        
        $points = CarteModel::selectPointsWhere("num_carte" ,$user['num_carte']) ;   // on selectionne les point de l'utilisateur

    } 

    else 
    {
        header('location:error.php?message?403 Forbidden') ; 
    }
}

if (isset($_POST['inscription'])) 
{
    include '../config/database.php' ;

    include "../models/carteModel.php" ; 

    $client['name'] = htmlspecialchars($_POST['name']) ;
    $client['lastName'] = htmlspecialchars($_POST['lastName']) ;
    $client['phone'] = htmlspecialchars($_POST['phone']) ;
    $client['email']=  $_POST['email'] ;
    $client['password'] = base64_encode(hash_hmac('sha256' , $_POST['password'] , 'toto'));   
    $client['adresse'] = htmlspecialchars($_POST['adress']) ;
    $client['city'] = htmlspecialchars($_POST['city']) ;
    $client['code_postal'] = htmlspecialchars($_POST['code']) ;
    $client['country']  = htmlspecialchars($_POST['country']) ;
    $client['card_number'] = null ;

   
    
    ClientModel::addClient($client) ;            

    $user = ClientModel::selectWhere("email" , $client['email']) ; 

    include "carte.php" ; 

    $card_number = Cart::generateCardNumber() ; 

    ClientModel::updateWhere("num_carte" , $card_number , "email" , $client['email']) ; 

    $card['number'] = $card_number ; 
    $card['code'] = "" ; 
    $card['points'] = 0 ; 
       
    CarteModel::createCard($card) ;


     header('location:accountCreated.php?name='.$client['lastName']." ".$client['name']) ;

}


// le nombre des client 

$clientCount = ClientModel::count() ; 

if (isset($_POST['save']) && !empty($_POST['save'])) 
{
    if (empty($_POST['nom']) && empty($_POST['prenom'])&& empty($_POST['email']) && empty($_POST['password'])&&empty($_POST['ville']) && empty($_POST['pays'])&&
    empty($_POST['adress']) && empty($_POST['phone']) && empty($_POST['code_postal'])) 
    {
        $error = "Veuillez remplire au minimum l'un des champs du formulaire" ; 
    } 
    else
    {

        if (!filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)) { $error = "Adresse email non valide !" ;}
        
        if(strlen($_POST['password']) < 6) { $error = "Mote de passe doit comprendre plus de 6 caracter" ; }


        $client['nom'] = htmlspecialchars($_POST['nom']) ; 
        
        $client['prenom'] = htmlspecialchars($_POST['prenom']) ;
      
        $client['email'] = htmlspecialchars($_POST['email']) ; 
        $client['password'] = base64_encode(hash_hmac('sha256' , $_POST['password'] , 'toto'));   


        $client['pays'] = htmlspecialchars($_POST['pays']) ; 
        $client['adress'] = htmlspecialchars($_POST['adress']) ; 
        
        $client['phone'] = htmlspecialchars($_POST['phone']) ; 
        $client['code_postal'] = htmlspecialchars($_POST['code_postal']) ; 

        ClientModel::updateClientInfo($client , $_SESSION['clientId']) ; 
        header('location:../view/edit-profil.php') ;

    }

    
}
if (isset($_GET['removeClient'])) 
    {
        $id = $_GET['removeClient'] ; 
        
        ClientModel::deletWhere("id" , $id) ; 
    
        header('location:../back-office_/gestion_client.php') ; 
    
        
    }