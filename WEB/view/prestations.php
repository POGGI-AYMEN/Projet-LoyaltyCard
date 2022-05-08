<?php

include "../controllers/client.php";

include "../controllers/prestation.php";


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
    <link rel="stylesheet" href="../css/prestations.css">

    <title>Prestations</title>
</head>
<body>

<?php require("navbar.php"); ?>

<section class="light">
	<div class="container py-2">
		<div class="h1 text-center text-dark" id="pageHeaderTitle">Prestations</div>

        <?php foreach($prstations as $prstation){ ?>


		<article class="postcard light blue">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="../uploads/images/<?php echo $prstation['image']; ?>" alt="Image Title" />
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title blue"><a href="#"><?php  echo $prstation['nom']; ?></a></h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i><?php echo $prstation['date_debut']." jusqu'à ".$prstation['date_fin'] ; ?>
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt"><?php echo $prstation['description'] ?></div>
                <div class="d-flex justify-content-between">
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i><?php echo $prstation['catégorie'] ?></li>
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i><?php echo $prstation['description'] ?></li>
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i><?php echo $prstation['entreprise'] ;?></li>

                       
                    </ul>
                    <?php
                    include "../config/database.php";

                    $query = $con->prepare("SELECT * FROM Prestation_clients WHERE prestation = ? AND client = ?") ;

                    $query->execute([$prstation['id'] , $_SESSION['clientId']]) ;

                    $res = $query->fetch(PDO::FETCH_ASSOC) ;

                    if (empty($res))
                    {
                        echo "
                        <a href='../controllers/prestation.php?clientId=".$_SESSION['clientId']."&&prestation=".$prstation['id']."'type='button' class='btn btn-secondary'>S'inscrir</a> " ;
                    }
                    else
                    {
                     echo "    <a href='../controllers/prestation.php?clientId=".$_SESSION['clientId']."&&cancel=".$prstation['id']."'type='button' class='btn btn-secondary'>Annuler</a> " ;
                    }


                    ?>
                </div>
			</div>
		</article>
		<?php } ?>



	</div>
</section>


<?php require("footer.php"); ?>