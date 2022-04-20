<?php 
include "../controllers/client.php" ; 

include "../controllers/historique.php" ; 

$products = Historique::getAll($_SESSION['clientId']) ; 

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   

   <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/historique-des-achats.css">
    <link rel="stylesheet" href="../css/user_footer.css"> 
    <title>Historique des achats </title>
</head>
<body>
<?php require("navbar.php"); ?>
<br>

<style>

    .card 
    {
        margin-top:50px;
    }
</style>
<div class="card ">
    
        <div class="col-md-12 cart">
            <div class="title">
                <div class="row">
                    <div class="col center">
                        <h4><b>HISTORIQUE DES ACHATS</b></h4>
                    </div>
                   
                </div>
            </div>
            
           <?php 
        foreach($products as $product){
           ?>
            <div class="row">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/ba3tvGm.jpg"></div>
                    <div class="col">
                        <div class="row text-muted"><?php echo $product['date'] ;  ?></div>
                        <div class="row"><?php echo $product['article'] ;  ?></div>
                    </div>
                    <div class="col"> <a href="#" class="border"><?php echo $product['quantité'] ;  ?></a> </div>
                    <div class="col"><?php echo $product['prix'] ?></div>
                    <div class="col"><a href="../config/download.php?fileName=<?php echo $product['facture_code'] ; ?>"><img src="../images/pdf.svg" height="45px;"></a></div>

                    <div class="col close"><a href="">Retour</a></div>
                </div>
            </div>
            <div class="row border-top border-bottom"></div>
               
            <?php 
            }
            ?>
            <div class="back-to-shop"><a href="UserAccount.php">&leftarrow;</a><span class="text-muted">RETOUR AU PROFIL</span></div>
        </div>
</div>

<?php require("footer.php"); ?>
