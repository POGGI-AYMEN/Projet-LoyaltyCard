<?php
include "config/responsse.php";
include "config/Database.php";

$statusCode = 200;

$headers = [
    "Content-Type" => "application/json",
];

$dbConnexion = Database::getConnection() ;

$data =  json_decode(file_get_contents("php://input") , true);

$email = $data['email'] ;

//$password = base64_encode(hash_hmac('sha256' , $data['password'] , 'toto'));
$password = $data['password'] ;


$query = $dbConnexion->prepare('SELECT * FROM Entreprise WHERE email = ? AND mdp = ?') ;

$query->execute([$email , $password]) ;

$result = $query->fetch(PDO::FETCH_ASSOC) ;

if (!empty($result))
{
    $body =[ "response" =>
        ["success" => 1, "data" => $result]
    ] ;
    echo Response::json($statusCode, $headers, $body);

    die() ;
}
else
{
    $body =[ "response" =>
        ["success" => 0, "data" => null]
] ;
    echo Response::json($statusCode, $headers, $body);

}


