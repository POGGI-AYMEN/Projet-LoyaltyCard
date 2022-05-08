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
    <link rel="stylesheet" href="../css/user_footer.css">
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
        <h1 class="text-center">Articles<br><br>
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

<<<<<<< HEAD
                        <div class="img-container">
                            <img class="img-responsive" src="../uploads/images/<?php echo $article['image']; ?>" height="100%" width="100%">
                        </div>
                        <div class="mc-description">
                        description : <?php  echo $article['Description'] ;   ?>
=======
                    <div class="img-container">
                        <?php if (!empty($article['image'])) echo " 
                        <img class='img-responsive' src='../uploads/images/".$article['image']."'' height='100%' width='100%'>
                        " ;
                        else
                        {
                            echo "     <img class='img-responsive' src='../images/logo.png' height='100%' width='100%'> " ;
                        }?>
                    </div>
                    <div class="mc-description">
                    description : <?php  echo $article['Description'] ;   ?>
>>>>>>> 1d01704c104ccfafcf81e8c692b26f5bfa4b0324

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



<?php require("footer.php"); ?>
