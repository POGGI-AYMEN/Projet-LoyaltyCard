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
<link rel="stylesheet" href="../back-office_/css/sb-admin-2.css">
   <link rel="stylesheet" href="../css/navbar.css">
   <link rel="stylesheet" href="../css/Articles.css">
    <link rel="stylesheet" href="../css/UserAccount.css">
    <link rel="stylesheet" href="../css/user_footer.css"> 
    <title>Edit profil </title>
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
    <div class="container" style="margin-top:50px;">
        <div class="row">
        <?php 
     foreach($articles as $article) 
        if ($articles[$i]['quantité'] > 0)
     {
       
    ?>
            <div class="col-md-3" style="margin-bottom:30px;">
                <div class="card-sl">
                    <div class="card-image">
                        <img
                            src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                    </div>
    
                    <a class="card-action" href="#"><i class="fa fa-heart"></i></a>
                    <div class="card-heading">
                       <?php echo $articles[$i]['nom'] ;  ?>
                    </div>
                    <div class="card-text">
                    <?php  echo $article['Description'] ;   ?>
                    </div>
                    <div class="card-text d-flex flex-row">
                        <div class="p-2"><?php echo $article['prix'] ;   ?></div>
                       <div class="p-2 ml-auto hey"><a href=""><ion-icon name="cart-outline" size="large" ></ion-icon></a></div>
                       
                        
                    </div>
                    <a href="../controllers/panier.php?addArticle=<?php echo $article['codeArticle'] ;   ?>" class="card-button">Acheter</a>
                </div>
            </div>
            <?php 
              $i++ ; 
              
         }
   
            ?>
            
<?php require("footer.php") ?>
