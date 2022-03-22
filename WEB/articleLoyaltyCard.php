<?php
session_start() ;
include 'config/database.php' ;

$query = $con->prepare("SELECT * FROM Article WHERE vendeur = 'LoyaltyCard'") ;

$query->execute() ;

while ($result = $query->fetch(PDO::FETCH_ASSOC)){

  echo "code  :" . $result['codeArticle'] ."<br>";
  echo "nom  :". $result["nom"] ."<br>" ;
  echo "catégorie  :". $result["catégorie"] ."<br>" ;
  echo "prix  :". $result["prix"] ."<br>" ;
  echo "point  :". $result["nombrePoint"] ."<br>" ;
  echo "codeBarre  :". $result["codeBarre"] ."<br>" ;
  echo "vendeur  :". $result["vendeur"] ."<br>" ;

  if (isset($_SESSION['clientId'])) {
  echo '<input type="submit" name="add" value="Ajouter au panier">
  <input type="submit" name="buy" value="Acheter">';
}

}

  ?>
