<?php 
session_start() ;
 ?>

<!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/gestion_entreprise.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Gestion entreprise</title>
   </head>
   <?php if (isset($_SESSION['adminId'])) { ?>

   <body>

   		<header>
   		<?php  include "header.php" ;  ?>	
   		</header>



   		<main>
   			<h1 id="title">Entreprises</h1>
   			<div class="container">

   			
   			<?php 
			include "../config/database.php" ; 

			$sql = "SELECT * FROM Entreprise" ; 
			$req = $con->prepare($sql) ; 
			$req->execute() ; 

			while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
					
			  ?>

			<div class="listContainer">
					<div class="title">
						<a href="infoEntreprise.php?id=<?php echo $result['id']; ?>"><?php echo $result['id']. "  ".$result['nom']; ?></a>
					</div>	
					<div class="options">
						<a id="delete" href="deleteEntreprise.php?id=<?php echo $result['id']; ?>">Supprimer</a>
						<a id="edit" href="editeEntrprise.php?id=<?php echo $result['id']; ?>">Modifier</a>
						<a id="contact" href="messageEntreprise.php?id=<?php echo $result['id']; ?>">Contact</a>

					</div>

			</div>
		<?php } ?>

</div>
   		</main>

   		

   </body>

<?php }else header('location:../error.php?message=403 Forbidden') ?>
   </html>




