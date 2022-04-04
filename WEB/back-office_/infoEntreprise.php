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
      <?php 
      include "../config/database.php" ; 

      if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id  = $_GET['id'] ; 
      } else {
        header('location:../error.php?message=Erruer 404 not found') ; 
      }

      $sql = "SELECT * FROM Entreprise WHERE id = ? "  ; 
      $req = $con->prepare($sql);
      $req->execute([$id]) ; 

      $result = $req->fetch(PDO::FETCH_ASSOC) ; 
      
      ?>

   		</main>
      <h1 id="title"><?php echo  $result['nom'] ; ?></h1>
<div class="infoContainer">
        <div class="info">

          <div class="row-1">
              <h6>ID: </h6> <p><?php echo $result['id']; ?></p>
              <h6>NOM: </h6>  <p><?php echo $result['nom']; ?></p>
              <h6>Gérant: </h6>  <p><?php echo $result['gérant']; ?></p>
              <h6>DATE DE CREATION: </h6>  <p><?php echo $result['date_de_création']; ?></p>
              <h6>SIEGE SOCIALE: </h6>  <p><?php echo $result['adresse']; ?></p>
          </div>

          <div class="row-2">
            <h6>SECTEUR D'ACTIVITE: </h6>  <p><?php echo $result['activité']; ?></p>
            <h6>SEIRET: </h6>  <p><?php echo $result['siret']; ?></p>
            <h6>EMAIL: </h6>  <p><?php echo $result['email']; ?></p>
            <h6>TELEPHONE: </h6>  <p><?php echo $result['numéro_tel']; ?></p>



          </div>

</div>
<hr> <h2 style="text-align: center;">Gestion</h2>
<h6>chiffre d'affaire de l'année <?php echo date("Y"); ?>  :</h6> <p><?php echo $result['chiffre_daffaire']." "."€"; ?></p>
<h6>duré du contrat : </h6> <p><?php echo $result['contrat']?></p>
<h6>Montant a payer pour l'année  <?php echo date("Y"); ?> </h6> <?php echo paymentAmount($result['chiffre_daffaire']); ?>
<h6>date du dernier payement : </h6> <p><?php echo $result['date_de_payement']?></p>
        


        </div>  


        </main>
   		

   </body>
 <?php }else { header('location:../error.php?message=403 Forbbiden') ;} ?>
   </html>




