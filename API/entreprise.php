<?php
include "controllers/Entreprise.php" ;
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {

// retourn les data d'une entreprise
    if (isset($_GET['entreprise'])) {
        $entreprise = $_GET['entreprise'];
        Entreprise::get($entreprise) ;
        die();


}


}
// modifier une entrerpsie
if ($method === "PATCH")
{
    if (isset($_GET['entreprise']) && isset($_GET['type'])) {
        $entreprise = $_GET['entreprise'];
        Entreprise::update($entreprise , $_GET['type']);
        die();
    }

}


