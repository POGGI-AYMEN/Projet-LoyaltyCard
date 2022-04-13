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

    $card_number = 10000000 + $user['id'] ; 

    ClientModel::updateWhere("num_carte" , $card_number , "email" , $client['email']) ; 

    $card['number'] = $card_number ; 
    $card['code'] = "" ; 
    $card['points'] = 0 ; 
       
    CarteModel::createCard($card) ;


     header('location:accountCreated.php?name='.$client['lastName']." ".$client['name']) ;

}


// le nombre des client 

$clientCount = ClientModel::count() ; 


