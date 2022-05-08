<?php


include "controllers/Ventes.php";
$method = $_SERVER["REQUEST_METHOD"];

// retourn tous les ventes d'une entreprise
if ($method === "GET")
{
    if (isset($_GET['company']))
    {
        $company = $_GET['company'] ;
        Ventes::get($company) ;
        die() ;
    }
}
