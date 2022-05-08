<?php


include "controllers/Cartes.php";
$method = $_SERVER["REQUEST_METHOD"];

// retourn les data d'un carte
if ($method === "GET")
{
    if (isset($_GET['cardNumber']))
    {
        $cardNumber = $_GET['cardNumber'] ;
        Cartes::get($cardNumber) ;
        die() ;
    }
}


// modifier les point d'un carte
if ($method === "PATCH") {
/*
 *  passer deux paramttre dans le get
 * cardNumber ==> le numéro de la carte concerné
 * type => plus : pour ajouter des point
 *         minus : pour enlevé des points
 */


  if (isset($_GET['cardNumber']) && $_GET['type'])
  {
      $cardNumber = $_GET['cardNumber'] ;
      $type = $_GET['type'] ;
      Cartes::update($cardNumber , $type) ;
      die() ;
  }


}
