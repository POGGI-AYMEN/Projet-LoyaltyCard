<?php


include "controllers/ListUsers.php";


// on récupere la méthode de la requete http
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {

    // retoure tous les article vendu par une entreprise choisi
    if (isset($_GET['id'])) {
        $company = $_GET['id'];

        ListUsers::get($company);
        die();
    }
}
