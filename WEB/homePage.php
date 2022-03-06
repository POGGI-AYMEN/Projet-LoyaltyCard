<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/homePage.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Header</title>
</head>
<body>
        <div class="header-blue">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">LOYALTYBOOST</a>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#">Contact</a></li>
                            <li class="nav-item dropdown"><a class=" nav-link"  aria-expanded="false" href="#">Services</a></li>
                        </ul>
                        <span class="navbar-text"> 
                            <a class="login" href="connexion.php">Log In</a>
                        </span>
                        <a class="btn btn-light action-button" role="button" href="inscription.php">Signup</a>
                    </div>
                </div>
            </nav>
            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 ">
                        <h1>Business goal designs</h1>
                        <p>Fidélisez plus de clients<br>
                            Recrutez de nouveaux clients<br>
                            Augmentez votre chiffre d'affaires<br></p> 
                        <button class="btn btn-light btn-lg action-button" type="button">Rejoine nous<i class="fa fa-long-arrow-right ml-2"></i></button>
                    </div>
                    <div class="col-md-4 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="iphone-mockup"> <img class="device" src="images/presentation-image.svg"> <!-- <div class="screen">	</div>	-->
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        <div class="A_propos">
            <h1>A propos</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam adipisci voluptatem, sequi ratione consequuntur dolor alias minus? Quod beatae dolore officia, consequuntur quasi blanditiis quos repellat rerum non nam modi!</p>
        </div>
        <div class="rejoindre ">
            <div class="client_part">
                <h1>Client</h1>
                <div class="image_client">
                    <img src="images/" alt="">
                </div>
                <p>asdfasdf</p>
                <div class="btn"></div>
            </div>
            <div class="entreprise_part">

            </div>
        </div>
    
    
    
<?php  require "footer.php"; ?>