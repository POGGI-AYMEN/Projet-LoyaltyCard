<?php
session_start() ;
include 'config/database.php' ;
 

/** 
 * récupération des tous les article de la table article ou le vendeur est LoyalltyCard et la quantité > 1 (article existe dans le stock)
 */
$query = $con->prepare("SELECT * FROM Article WHERE vendeur = 'LoyaltyCard' AND quantité > 1") ;    

$query->execute() ;

   

/*$codeArticle = $result['codeArticle'] ; 
  echo "code  :" . $result['codeArticle'] ."<br>";
  echo "nom  :". $result["nom"] ."<br>" ;
  echo "catégorie  :". $result["catégorie"] ."<br>" ;
  echo "prix  :". $result["prix"] ."<br>" ;
  echo "point  :". $result["nombrePoint"] ."<br>" ;
  echo "codeBarre  :". $result["codeBarre"] ."<br>" ;
  echo "vendeur  :". $result["vendeur"] ."<br>" ;
  echo "description  :". $result["Description"] ."<br>" ; */




?>



<?php require("header.php") ; ?>





<div class="container" style="margin-top:50px;">
        <div class="row">
<?php
while ($result = $query->fetch(PDO::FETCH_ASSOC)){  
  $nom_article = $result["nom"] ;
$prix_article = $result["prix"];
$description_article = $result["Description"];
?>
  

    
            <div class="col-md-3" style="margin-bottom:30px;">
                <div class="card-sl">
                    <div class="card-image">
                        <img
                            src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                    </div>
    
                    <a class="card-action" href="#"><i class="fa fa-heart"></i></a>
                    <div class="card-heading">
                        <?= $nom_article?>
                    </div>
                    <div class="card-text">
                        <?= $description_article ?>
                    </div>
                    <div class="card-text d-flex flex-row">
                        <div class="p-2 price"> <?= $prix_article ?> €</div>
                       <div class="p-2 ml-auto "><a href=""><ion-icon name="cart-outline" size="large" ></ion-icon></a></div>
                    </div>
                    <div class="quantity">

                      <h5>Quantite</h5>
                      <div class="container mt-5">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="number" id="qty_input" class="form-control form-control-sm" value="1" min="1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                       </div>
                    </div>
                    <div class="card-button">
                        <a href="#" > Acheter</a>
                     </div>
                        
                </div>
            </div>
            <?php  }  ?>
           
          
           </div>  

    </div>      
  







<?php

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




<?php require("footer.php") ?>
