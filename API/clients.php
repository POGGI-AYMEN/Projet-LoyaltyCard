<?php
include "controllers/Clients.php" ;
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET")
{


    if (isset($_GET['client']))     // retourn les data d'un client  // client = l'id du client
    {
        
        $client = $_GET['client'] ;
        Client::getOneClient("id", $client) ;
        die() ;
        
    } elseif(isset($_GET['delete']))        // delete = l'id du client -> supprime un client
    {
        $client = $_GET['delete'] ;
        Client::delete($client);
    }else
    {                               // retourn tous les client
        Client::get();
        die() ;
    }
}

if ($method === "PATCH")
{
    if (isset($_GET['id']))         // modifier les data d'un client
    {
        $client = $_GET['id'] ;
        Client::update($client);       // faut passer l'id du client en get
        die();
    }


}
        // ajout un client
if ($method === "POST")
{
    Client::post() ;
    die() ;
}

