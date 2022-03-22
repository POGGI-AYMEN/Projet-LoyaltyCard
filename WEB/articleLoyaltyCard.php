<?php
session_start() ;
include 'config/database.php' ;
 

/** 
 * récupération des tous les article de la table article ou le vendeur est LoyalltyCard et la quantité > 1 (article existe dans le stock)
 */
$query = $con->prepare("SELECT * FROM Article WHERE vendeur = 'LoyaltyCard' AND quantité > 1") ;    

$query->execute() ;

while ($result = $query->fetch(PDO::FETCH_ASSOC)){        

$codeArticle = $result['codeArticle'] ; 
  echo "code  :" . $result['codeArticle'] ."<br>";
  echo "nom  :". $result["nom"] ."<br>" ;
  echo "catégorie  :". $result["catégorie"] ."<br>" ;
  echo "prix  :". $result["prix"] ."<br>" ;
  echo "point  :". $result["nombrePoint"] ."<br>" ;
  echo "codeBarre  :". $result["codeBarre"] ."<br>" ;
  echo "vendeur  :". $result["vendeur"] ."<br>" ;




  


?>
<form method="post">
<input type="submit" name="add" value="Ajouter au panier">
<input type="submit" name="buy" value="acheter">

<br>
<br>




<?php
}
/**
 * si l'utilisateur clique sur les bouttons ajout  / achter /panier et il n'est pas connecter redirection vers page de connexion 
 * sinon en redirige vers les page 
 */
if (isset($_POST['add'])) 
{
  if (isset($_SESSION['clientId'])) 
  {
    header('location:config/addArticleToPanel.php?code='.$codeArticle) ;   // on envoie le code de l'article dans le get  //
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

if (isset($_POST['panel'])) 
{
  if (isset($_SESSION['clientId'])) 
  {
    header('location:panel.php?id='.$_SESSION['clientId']) ;   // on envoi l'id de l'utilisateur dans le get pour récupérer sa propre panier // 
  } else 
  {
    header('location:connexion.php') ; 
  }
}



?>


<form method="post">


<input type="submit" name="panel" value="Panier">



</form>