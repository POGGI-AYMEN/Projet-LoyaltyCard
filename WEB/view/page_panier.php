<?php

include "../controllers/panier.php" ;



$i = 0  ;
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

    <link rel="stylesheet" href="../../back-office_/css/sb-admin-2.css">

   <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/page_panier.css">
    <link rel="stylesheet" href="../css/footer.css">
   <!-- <link rel="stylesheet" href="../css/UserAccount.css"> -->
  <!--  <link rel="stylesheet" href="../css/Articles.css"> -->
    <!-- <link rel="stylesheet" href="../css/Contact_page.css"> -->
   <!-- <link rel="stylesheet" href="../back-office_/css/sb-admin-2.css"> -->
    <title>Panier</title>
</head>
<body>
<?php require("navbar.php"); ?>
<br><br>
<div class="card ">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col center">
                        <h4><b>PANIER</b></h4>
                    </div>

                </div>
                <?php if (isset($_GET['error']))
                {
                    echo $_GET['error'] ;
                } ?>
            </div>
            <?php
            foreach($myPanel as $panel)
            {
            ?>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="../uploads/images/<?php echo $myPanel[$i]['image']; ?>"></div>
                    <div class="col">
                        <div class="row text-muted"><?php echo $myPanel[$i]['catégorie'] ; ?></div>
                        <div class="row"><?php echo $myPanel[$i]['article'] ;  ?></div>
                    </div>
                    <div class="col"><p class="articles"><?php echo $myPanel[$i]['quantité'] ;  ?></p></div>
                    <div class="col"><a href="../controllers/panier.php?incArticle=<?php echo $myPanel[$i]['article'] ?>" class="border">+</a></div>
                    <div class="col"><a href="../controllers/panier.php?decArticle=<?php echo $myPanel[$i]['article'] ?>" class="border">-</a></div>

                    <div class="col"><p class="price"> <?php echo $myPanel[$i]['prix'] * $myPanel[$i]['quantité']; ?></p> </div>
                    <div class="col close"><a href="../controllers/panier.php?deleteArtilce=<?php echo $myPanel[$i]['article'] ?>">&#10005;</a></div>
                </div>
            </div>

               <?php
            $i++ ;
            }
               ?>

            <div class="back-to-shop"><a href="UserAccount.php">&leftarrow;</a><span class="text-muted">RETOUR AU PROFIL</span></div>

            <p>Voulez-vous utilisé vos points</p>
            <p style="color:red" id="error"></p>
            <input id="points" name="usedPoints" placeholder="nombre des points">
            <button type="submit" id="use">Utiliser</button>

        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>PAYEMENT</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">NOMBRE D'ARTICLES</div>
                <div id="articleNumber" class="col text-right"> </div>
            </div>
           <br>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">PRIX TOTAL</div>
                <div id="totalSum" class="col text-right"></div>
            </div><button id="payment" class="btn">PAYER</button></a>
        </div>
    </div>
</div>

<script src="../JS/cart.js"></script>

<?php require("footer.php"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
