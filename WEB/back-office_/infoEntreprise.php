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

   		
   		<?php  include "header.php" ;  ?>	
   	
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

  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Information de l'entreprise <strong><?php echo  $result['nom'] ; ?></strong></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      
                        <th>Nom</th>
                        <th>Information</th>
                       
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                    ID
                    </td>
                    <td>
                    <p><?php echo $result['id']; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>
                    NOM
                    </td>
                    <td>
                    <p><?php echo $result['nom']; ?></p>
                    </td> 
                  </tr>
                  <tr>
                    <td>EMAIL</td>
                    <td> <p><?php echo $result['email']; ?></p> </td> 
                  </tr> 
                  <tr>
                    <td>TELEPHONE</td>
                    <td> <p><?php echo $result['numéro_tel']; ?></p> </td> 
                  </tr> 

                  <tr>
                    <td>
                    GÉRANT
                    </td>
                    <td>
                    <p><?php echo $result['gérant']; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>DATE DE CREATION</td>
                    <td>
                    <p><?php echo $result['date_de_création']; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>SIEGE SOCIALE</td>
                    <td>
                    <p><?php echo $result['adresse']; ?></p>
                    </td> 
                  </tr>

                  <tr>
                    <td>SECTEUR D'ACTIVITE</td>
                    <td> <p> <?php echo $result['activité']; ?> </p> </td> 
                  </tr>  
                  <tr>
                    <td>SIRET</td>
                    <td> <p><?php echo $result['siret']; ?></p> </td> 
                  </tr> 
                   
                  <tr>
                    <td>chiffre d'affaire de l'année <?php echo date("Y"); ?></td>
                    <td>  <p><?php echo $result['chiffre_daffaire']." "."€"; ?> </td> 
                  </tr>  
                  <tr>
                    <td>duré du contrat</td>
                    <td>  <p><?php echo $result['contrat']?> </td> 
                  </tr> 
                  <tr>
                    <td>Montant a payer pour l'année <?php echo date("Y"); ?></td>
                    <td>  <?php echo paymentAmount($result['chiffre_daffaire']); ?> </td> 
                  </tr> 
                  <tr>
                    <td>date du dernier payement <?php echo date("Y"); ?></td>
                    <td>  <p><?php echo $result['date_de_payement']?></p> </td> 
                  </tr> 
                </tbody>
            </table>
            
        </div>
    </div>
  </div>

<?php }else { header('location:../error.php?message=403 Forbbiden') ;} ?>
  
 <?php require("footer.php"); ?>




