
<?php
session_start() ;
include 'config/database.php' ;
 

/** 
 * récupération des tous les article de la table article ou le vendeur est LoyalltyCard et la quantité > 1 (article existe dans le stock)
 */
$query = $con->prepare("SELECT * FROM Article WHERE vendeur = 'LoyaltyCard' AND quantité > 1") ;    

$query->execute() ;

   

?>



<?php require("header.php") ; ?>





<div class="container" style="margin-top:50px;">
<?php
if (isset($_GET['error']) && !empty($_GET['error']))
{
  $error = $_GET['error'] ; 
}
?>
<p style="color:red; text-align:center;"><?php if (!empty($error)) {echo $error ; } ?></p>

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
                        <?php
                          if (isset($_POST['quantity'])) 
                          {
                            $quantity = $_POST['quantity'] ; 
                            echo $quantity ;
                          }
                        ?>
                       <div class="p-2 ml-auto "><a href="config/addArticleToPanel.php?codeArticle=<?php echo $result['codeArticle'] ?>"><ion-icon name="cart-outline" size="large" ></ion-icon></a></div>
                    </div>
                    <div class="quantity">

                      
                      <div class="container mt-5">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="input-group mb-3">
                                
                                 
                                  
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
<?php require("footer.php") ?>

