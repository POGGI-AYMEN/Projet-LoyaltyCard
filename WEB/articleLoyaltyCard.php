<?php
session_start() ;
include 'config/database.php' ;
 


$query = $con->prepare("SELECT * FROM Article WHERE vendeur = 'LoyaltyCard' AND quantité > 1") ;    

$query->execute() ;

while ($result = $query->fetch(PDO::FETCH_ASSOC)){         /* recupération et affichage des donnée  */


$codeArticle = $result['codeArticle'] ; 
  echo "code  :" . $result['codeArticle'] ."<br>";
  echo "nom  :". $result["nom"] ."<br>" ;
  echo "catégorie  :". $result["catégorie"] ."<br>" ;
  echo "prix  :". $result["prix"] ."<br>" ;
  echo "point  :". $result["nombrePoint"] ."<br>" ;
  echo "codeBarre  :". $result["codeBarre"] ."<br>" ;
  echo "vendeur  :". $result["vendeur"] ."<br>" ;




  
}

if (isset($_POST['add'])) 
{
  if (isset($_SESSION['clientId'])) 
  {
    header('location:config/addArticleToPanel.php?code='.$codeArticle) ; 
  } else 
  {
    header('location:connexion.php') ; 
  }
}


if (isset($_POST['buy'])) 
{
  if (isset($_SESSION['clientId'])) 
  {
  //  header('location:config/addArticleToPanel.php?code='.$codeArticle) ; 
  } else 
  {
    header('location:connexion.php') ; 
  }
}


?>
<form method="post">
<input type="submit" name="add" value="Ajouter au panier">
<input type="submit" name="buy" value="acheter">

<br>
<br>

<input type="submit" name="panel" value="Panier">



</form>




