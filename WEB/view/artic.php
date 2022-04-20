<?php

include "../controllers/article.php" ;
include "../controllers/article.php" ;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../back-office_/css/sb-admin-2.css">

   <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/articl.css">

    <title>Articles</title>
</head>
<body>

<?php require("navbar.php");


    include "../controllers/article.php" ;
    $i = 0 ;

?>
    <p style="color:green;left:33%;"><?php if (isset($_GET['message']) && !empty($_GET['message']))
    {
        echo $_GET['message'] ;
    } ?>
    <p style="color:red;left:33%;"><?php if (isset($_GET['error']) && !empty($_GET['error']))
    {
        echo $_GET['error'] ;
    } ?>

<section class="container">
    <div class="page-header">
        <h1>Articles<br><br>
    </div>
    <div class="row active-with-click">

    <?php
     foreach($articles as $article)
        if ($article['quantité'] > 0)
     {

    ?>

        <div class="col-md-4 col-sm-6 col-xs-12">

            <article class="material-card Red">



                <h2>
                    <span> <?php echo $article['nom'] ;  ?></span>
                    <span> <?php echo $article['prix'] ;   ?> €</span>
                    <a href="../controllers/panier.php?addArticle=<?php echo $article['codeArticle'] ;   ?>">Ajouter au panier </a>
                </h2>

                
             
                <div class="mc-content " >

                    <div class="img-container">
                        <img class="img-responsive" src="../uploads/images/<?php echo $article['image']; ?>" height="100%" width="100%">
                    </div>
                    <div class="mc-description">
                    description : <?php  echo $article['Description'] ;   ?>

                    <p>Vendeur : <?php echo $article['vendeur'];  ?></p>

                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>

            </article>
           
        </div>
        <?php
              $i++ ;

         }

            ?>

    </div>
</section>


<!-- JavaScript Bundle with Popper -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="../JS/articl.js"></script>
</body>
</html>
