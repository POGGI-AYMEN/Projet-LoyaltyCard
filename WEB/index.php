<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/homePage.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Header</title>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example">
   
    <nav id="navbar-example" class="navbar">
        <span><a class="logo navbar-brand link-dark lead" href="homePage.php"><img src="images/logo.png" alt="" height="50px" width="70px"></a></span>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link link-dark lead" href="#A_propos">A propos</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link link-dark lead" href="#clienetOrEntreprise">Nous rejoindre</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link link-dark lead" href="Contact_Page.php">Contact</a>
            </li>
            <!--
            <li class="nav-item ">
                <a class="btn btn-dark lead btn_con" href="connexion.php" role="button">Admin</a>            
            </li>
            -->
            <li>
                <a class="btn btn-dark lead btn_con" href="connexion.php" role="button">Se connecter</a>
            </li>   
            

        </ul>
    </nav>
   
    <div class="header-blue" >  
            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 ">
                        <h1>Business goal designs</h1>
                        <p>Fidélisez plus de clients<br>
                            Recrutez de nouveaux clients<br>
                            Augmentez votre chiffre d'affaires<br></p> 
                            <button class="btn_stndr"><a href="#clienetOrEntreprise">rejoins nous!</a></button>                     
                    </div>
                    <div class="col-md-4 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="iphone-mockup"> <img class="device" src="images/presentation-image.svg"> <!-- <div class="screen">	</div>	-->
                        </div>
                    </div>
                </div>
                
            </div>
            
    </div>
        <div id="A_propos" class="A_propos">
            <div class="presentation">
                <h1>A propos</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam adipisci voluptatem, sequi ratione consequuntur dolor alias minus? Quod beatae dolore officia, consequuntur quasi blanditiis quos repellat rerum non nam modi!</p>
                <button class="btn_stndr"><a href="#clienetOrEntreprise">Adherer</a></button>           

            </div>
            <img src="images/undraw_pay_online.svg" alt="pay_online" height="350px" width="350px">
            
        </div>

        <div class="programme_unique part2">
            <img src="images/undraw_complete_design.svg" alt="pay_online"  width="350px">
            <div class="presentation__2">
                <h1>Vos clients trouvent votre programme unique</h1>
                <p> <span>LOYALTYBOOST</span> vous permet de construire le programme de fidélité qui vous convient le mieux, en fonction de votre secteur, de votre positionnement et de vos objectifs.

                    Nous vous accompagnons dans la définition de votre programme idéal : type de programme, mécaniques de récompense et modalités d’attribution des points, modules complémentaires…</p>
            </div>
        </div>

        <div class=" part3">
            <div class="part3_pre">
                <h1 class="title">Boutique en ligne</h1>
                
                <div class="flexbox_"> 
                    <div class="presentaation">
                        <p class="paragraph">  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel nulla unde dolorem incidunt tempore similique vero alias sapiente velit, culpa itaque, quia soluta veniam voluptas maiores repudiandae non, quis beatae.</p>
                        <button class="btn_stndr"><a href="#clienetOrEntreprise">Boutique</a></button>           

                    </div>
                    <img src="images/undraw_mobile_pay_re.svg" alt="pay_online"  width="350px">
                </div>
            </div>      
        </div>
     
        <div id="clienetOrEntreprise" class="rejoindre">
            <div class="entreprise_part">
                <h1>Entreprise</h1>
                <div class="image_entreprise btn">
                    <img src="images/undraw_business.svg" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus quisquam, vitae ipsum possimus iure dolore magnam molestias beatae tempore expedita blanditiis ab ut illo voluptas repudiandae. At sed nulla minima!</p>
                <button class="btn_stndr"><a href="condidature_entreprise.php">Hover me!</a></button>           
            </div>
            <div class="client_part">
                <h1>Client</h1>
                <div class="image_client btn">
                    <img src="images/undraw_client.svg" alt="">
                </div>
                <p>Lorem ipsum dolor sit amet ,  tempora ducimus reprehenderit non voluptatibus aliquam consequatur earum minima eveniet natus eum aut, placeat possimus quae aperiam repudiandae tempore.</p>
                <button class="btn_stndr"><a href="inscription.php">Hover me!</a></button>           
             </div>
        </div>

        <script src="JS/scrollSpy.js" ></script>

        
        <?php  require "footer.php"; ?>