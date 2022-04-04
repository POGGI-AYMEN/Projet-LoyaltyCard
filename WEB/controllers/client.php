<?php 
require '../models/clientModel.php' ;


if (isset($_POST['inscription'])) 
{
    include '../config/database.php' ;

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

    header('location:accountCreated.php?name='.$client['lastName']." ".$client['name']) ;

}

// le nombre des client 

$clientCount = ClientModel::count() ; 


